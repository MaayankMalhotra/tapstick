# Meta Pixel tracking

The storefront uses Laravel 12.69.2 (composer.lock), server-rendered Blade views,
plain JavaScript and public assets. There is no Vite build or additional dependency
for this integration. The shared layout is `resources/views/layouts/app.blade.php`.
Admin/vendor layouts and standalone portfolio/Graze pages do not use this layout.
No existing Meta Pixel, GTM, Conversions API, consent manager or privacy preference
implementation was found in the application.

## Configuration

The values are set directly in `config/services.php`; no Meta `.env` entries are required:

```php
'meta' => [
    'pixel_id' => '1631769315356742',
    'require_consent' => false,
],
```

An empty `services.meta.pixel_id` disables the integration. The ID is public, not a credential.
No ad-account ID, access token, customer identifiers or advertising budget is used.
Production `.env` stays untracked; existing Meta environment values are not used.

No consent UI was added, preserving the existing design. The integration honors
the server session boolean `marketing_consent=false`. If a consent workflow is
required, set `require_consent` to `true` in `config/services.php` and have that workflow persist the
boolean `marketing_consent=true` before reloading the page. With that setting,
no Meta script or events load until consent is granted. Revocation takes effect
on the next full navigation/reload. There is deliberately no noscript tracking
image that could bypass this gate. Review the site's privacy notice as part of
enabling advertising tracking.

## Events and integration points

| Event | Trigger | Data |
| --- | --- | --- |
| PageView | Shared storefront layout | One initialization and event per document |
| ViewContent | `StoreController::show`, `/products/{slug}` | Real product ID, price, quantity 1 |
| AddToCart | `StoreController::addToCart`, successful `POST /cart/{product}` | Actual positive quantity added after stock/20-item cap, current price |
| InitiateCheckout | `CheckoutController::create`, valid nonempty `/checkout` | Cart IDs, quantities, current prices and checkout total including shipping |
| Purchase | `/orders/{order_number}/success`, following signature-verified Razorpay payment | Saved order total including shipping; saved item IDs, quantities and unit prices |

All commerce events contain `currency=INR`, `content_type=product`, `content_ids`,
`contents`, `num_items` and numeric `value`. IDs are stringified database product
IDs; align a future Meta catalog to these IDs. Deleted products use an order-item
fallback identifier. Dynamic JavaScript is serialized using Laravel `Js::from`.
AJAX additions return tracking data to the existing drawer and AI chat product
cards; regular form additions
flash it for the next page. Rejected additions and zero quantity increases emit no
AddToCart. Quantity edits and removals do not count as additions.

## Purchase safeguards and limitations

The existing Razorpay verification endpoint validates HMAC signatures and marks
the order `paid`. This integration leaves that payment logic intact and grants
tracking eligibility only to the session completing that transition. The existing
already-paid callback response does not grant eligibility again. Loading an order
URL from another session cannot generate a Purchase. COD remains `cod_pending`
and does not generate Purchase, even when the confirmation page says confirmed.
Pending, failed, cancelled and refunded orders are excluded.

Before rendering Purchase, an atomic cache claim keyed by order number suppresses
parallel page loads and subsequent visits for five years. Successful emission also
consumes session eligibility. Browser localStorage suppresses repeat execution
(including restored HTML) and the event uses `eventID=purchase-{order_number}`.
Keep a persistent shared cache (the project's default database store is suitable)
across workers and deploys. Array/null cache stores are not suitable in production.
Clearing/evicting cache removes that layer of protection; the session and browser
guards still help, but this is not a permanent database conversion ledger.
Cache errors skip tracking and are reported without breaking confirmation.

The claim is made when rendering, not after Meta confirms delivery. Script/ad
blockers, JavaScript disabled, closing the tab, a lost session, or a failed network
request can therefore lose a conversion. Consent denial does not consume eligibility,
but a later grant requires revisiting confirmation in the same session. This is
browser tracking with best-effort delivery, not a guarantee of exactly-once receipt.
The existing gateway only checks signatures; it does not fetch captured payment
status from Razorpay. Tracking follows that existing paid model. COD payments
collected later and purchases completed without returning to this browser are not
reported by this integration.

## Deploy manually

1. Review and merge the tracking branch only when ready to deploy. The repository's
   GitHub push webhook auto-deploys `main`, so pushing this feature branch does not
   deploy it. No production commands were run for this change.
2. Confirm the production cache/session stores are
   persistent and writable. If consent gating is enabled, connect the preference
   workflow before expecting events.
3. Use the existing deployment process. Dependencies and schema are unchanged.
   Rebuild configuration/views with `php artisan config:cache` and
   `php artisan view:cache`; avoid clearing the conversion cache unnecessarily.
4. Check the public page, cart drawer, normal form checkout and Razorpay flow.
   Disable tracking by setting `pixel_id` to an empty string in `config/services.php`
   and rebuilding config.

## Verify after deployment

1. Open Meta Events Manager, select dataset **1631769315356742**, and open
   **Test Events**. Use its browser/website testing flow to open `https://tabstick.in/`.
2. In that browser, grant marketing consent if configured, view a product, add it
   to the cart and enter checkout. Check for PageView, ViewContent, AddToCart and
   InitiateCheckout; inspect IDs, quantities, INR currency and values.
3. Complete an authorized Razorpay test purchase on staging with test credentials,
   or an explicitly approved real purchase on production. Confirm one Purchase
   with the saved order total and matching line items. Refresh confirmation and
   retry the payment callback: neither should add a second Purchase.
4. Check pending/failed payment, closed payment popup, cancelled order and COD
   flows: no Purchase should appear. A fresh browser visiting an existing paid
   order URL must not create a new Purchase.
5. Meta Pixel Helper and browser Network tools can additionally confirm the Pixel
   ID and event requests. Account permissions, blockers, consent, dataset traffic
   permissions and processing delays may affect visibility. Receipt is confirmed
   only when the events appear in Events Manager. No live receipt has been verified.

The campaign's Purchase optimization can be checked in Ads Manager after verified
events arrive; code alone cannot confirm the warning has cleared. No ads or budgets
are changed by this integration.

## Future Conversions API

No existing CAPI implementation was found. A future implementation could dispatch
a server event after confirmed payment using a queued job and durable conversion
ledger. Use the same event name `Purchase` and `event_id=purchase-{order_number}`
as browser `eventID` for browser/server deduplication, and implement consent,
retries, capture verification and any customer-data hashing deliberately. Store
access tokens only in server environment configuration. This change introduces
no CAPI token, server event call or third-party dependency.

## Checks

```sh
php artisan test
node --test tests/JavaScript/meta-pixel.test.cjs
```

The dedicated feature tests exercise consent/config gating, commerce payloads,
clamped quantities, regular form flash consumption, invalid signatures, successful
verification, repeated callbacks, cache claims and nonqualifying orders. JavaScript
tests execute the real loader in a simulated browser without contacting Meta.

Validation completed locally: **104 Laravel tests, 595 assertions, and 3 JavaScript
tests passed**. PHP syntax checks and Blade view compilation passed; Pint passed
for the new PHP service and feature tests. The installed PHP is outside PATH at
`C:\xampp\php\php.exe`; the full suite was run directly through PHPUnit with
`-d extension=zip` because catalog tests require ZIP support. No live Meta events
or real gateway payments were submitted during these checks.

## Modified files

- `.env.example`
- `config/services.php`
- `app/Services/MetaPixel.php`
- `app/Http/Controllers/StoreController.php`
- `app/Http/Controllers/CheckoutController.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/partials/meta-pixel.blade.php`
- `resources/views/partials/sticker-ai-chat.blade.php`
- `public/js/meta-pixel.js`
- `public/js/cart-drawer.js`
- `tests/Feature/MetaPixelTest.php`
- `tests/JavaScript/meta-pixel.test.cjs`
- `META_PIXEL_SETUP.md`

Official references: [Meta Pixel reference](https://developers.facebook.com/docs/meta-pixel/reference/)
and [conversion tracking](https://developers.facebook.com/docs/meta-pixel/implementation/conversion-tracking/).
These pages were rate-limited during implementation; live account validation remains manual.
