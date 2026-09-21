@extends('layouts.app')

@section('title', 'Your Cart | Tabstick')

@section('content')
<div class="container cart-page-container">
    <h1 class="cart-page-title">Your Cart</h1>

    @if($items->isEmpty())
        <div style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:60px 20px;text-align:center;">
            <div style="font-size:3.5rem;margin-bottom:12px;">🛒</div>
            <h3 style="font-family:var(--font-heading);font-size:1.6rem;font-weight:900;margin-bottom:8px;color:var(--color-ink);">Your cart is empty</h3>
            <p style="color:var(--color-ink-muted);margin-bottom:24px;font-size:1rem;">Find stickers that speak your vibe!</p>
            <a href="{{ route('home') }}#shop" class="btn-pop-primary" style="display:inline-block;padding:12px 32px;">Explore Stickers</a>
        </div>
    @else
        <!-- INTERACTIVE MINIMUM ORDER & SHIPPING GOAL TRACKER -->
        <div class="cart-goal-tracker-card" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:20px 24px;margin-bottom:28px;">
            @if(!$minOrderReached)
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:12px;">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <span style="font-size:1.8rem;line-height:1;">⚡</span>
                        <div>
                            <div style="font-family:var(--font-heading);font-weight:900;font-size:1.15rem;color:var(--color-ink);">
                                Add <span style="color:var(--color-pop-red);">Rs. {{ number_format($minOrderDiff, 2) }}</span> more to unlock Checkout!
                            </div>
                            <div style="font-size:0.86rem;color:var(--color-ink-muted);font-weight:700;margin-top:2px;">
                                Minimum order requirement is <strong>Rs. {{ number_format($minOrderAmount, 2) }}</strong>. Bump quantities or add stickers below.
                            </div>
                        </div>
                    </div>
                    <div style="background:var(--color-pop-yellow);border:2px solid var(--color-ink);padding:6px 14px;border-radius:var(--radius-pill);font-weight:900;font-size:0.88rem;box-shadow:2px 2px 0 var(--color-ink);white-space:nowrap;">
                        Rs. {{ number_format($subtotal, 2) }} / Rs. {{ number_format($minOrderAmount, 2) }}
                    </div>
                </div>

                <!-- Animated Progress Bar -->
                <div class="progress-bar-track" style="background:var(--color-bg-page);border:2px solid var(--color-ink);border-radius:var(--radius-pill);height:16px;overflow:hidden;position:relative;box-shadow:inset 0 2px 4px rgba(0,0,0,0.08);">
                    <div class="progress-bar-fill" style="width:{{ max(8, $minOrderProgress) }}%;height:100%;background:linear-gradient(90deg, #FF6B35, #FF334B);border-radius:var(--radius-pill);transition:width 0.4s ease;"></div>
                </div>
            @else
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:12px;">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <span style="font-size:1.8rem;line-height:1;">🎉</span>
                        <div>
                            <div style="font-family:var(--font-heading);font-weight:900;font-size:1.15rem;color:#16a34a;">
                                Minimum order reached! You're ready to checkout.
                            </div>
                            <div style="font-size:0.86rem;color:var(--color-ink-muted);font-weight:700;margin-top:2px;">
                                @if(!$freeShippingReached)
                                    Add <strong>Rs. {{ number_format($freeShippingDiff, 2) }}</strong> more for <strong>FREE Pan-India Delivery!</strong> 🚚
                                @else
                                    You've unlocked <strong>FREE Pan-India Express Delivery!</strong> ⚡
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="background:#DCFCE7;border:2px solid #16A34A;color:#15803D;padding:6px 14px;border-radius:var(--radius-pill);font-weight:900;font-size:0.88rem;white-space:nowrap;">
                        ✓ Ready to Checkout
                    </div>
                </div>

                <!-- Progress Bar for Free Shipping -->
                <div class="progress-bar-track" style="background:var(--color-bg-page);border:2px solid var(--color-ink);border-radius:var(--radius-pill);height:16px;overflow:hidden;position:relative;box-shadow:inset 0 2px 4px rgba(0,0,0,0.08);">
                    <div class="progress-bar-fill" style="width:{{ $freeShippingReached ? 100 : max(8, $freeShippingProgress) }}%;height:100%;background:linear-gradient(90deg, #10B981, #059669);border-radius:var(--radius-pill);transition:width 0.4s ease;"></div>
                </div>
            @endif
        </div>

        <div class="cart-layout">
            <div style="display:flex;flex-direction:column;gap:24px;">
                <div class="cart-card" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:24px;">
                    @foreach($items as $item)
                        @php
                            $p = $item['product'];
                            $imgSrc = $p->image ? (str_starts_with($p->image, 'http') ? $p->image : (str_starts_with($p->image, 'images/') ? asset($p->image) : asset('storage/'.$p->image))) : null;
                        @endphp
                        <div class="cart-item-row" style="border-bottom:1.5px solid var(--color-border-subtle);padding:18px 0;display:flex;align-items:center;gap:18px;">
                            <div class="cart-thumb" style="width:72px;height:72px;border-radius:14px;background:var(--color-bg-page);border:1.5px solid var(--color-ink);display:flex;align-items:center;justify-content:center;overflow:hidden;flex-shrink:0;">
                                @if($imgSrc)
                                    <img src="{{ $imgSrc }}" alt="{{ $p->name }} Vinyl Sticker - Tabstick" style="max-width:100%;max-height:100%;object-fit:contain;">
                                @else
                                    <span style="font-size:2rem;">{{ $p->emoji ?: '✨' }}</span>
                                @endif
                            </div>

                            <div class="cart-item-details" style="flex:1;">
                                <h3 style="font-family:var(--font-heading);font-size:1.05rem;font-weight:900;margin-bottom:4px;color:var(--color-ink);"><a href="{{ route('products.show', $p) }}">{{ $p->name }}</a></h3>
                                <div class="cart-item-price" style="color:var(--color-ink-muted);font-weight:700;font-size:0.88rem;">Rs. {{ number_format($p->price, 2) }} each</div>
                            </div>

                            <!-- Tactile Quantity Stepper with [-] and [+] -->
                            <form action="{{ route('cart.update', $p) }}" method="POST" class="cart-qty-form" id="qty-form-{{ $p->id }}" style="display:flex;align-items:center;gap:6px;">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="btn-qty-step minus-btn" onclick="stepCartQty('qty-input-{{ $p->id }}', -1, 'qty-form-{{ $p->id }}')" aria-label="Decrease quantity" style="width:34px;height:34px;border-radius:50%;border:2px solid var(--color-ink);background:var(--color-bg-page);font-size:1.1rem;font-weight:900;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:1px 1px 0 var(--color-ink);transition:transform 0.1s;">&minus;</button>

                                <input class="cart-qty-input" id="qty-input-{{ $p->id }}" type="number" name="quantity" min="1" max="{{ min(20, $p->stock) }}" value="{{ $item['quantity'] }}" onchange="this.form.submit()" style="width:52px;height:34px;padding:4px;border:2px solid var(--color-ink);border-radius:8px;text-align:center;font-weight:900;box-shadow:inset 1px 1px 2px rgba(0,0,0,0.1);">

                                <button type="button" class="btn-qty-step plus-btn" onclick="stepCartQty('qty-input-{{ $p->id }}', 1, 'qty-form-{{ $p->id }}')" aria-label="Increase quantity" style="width:34px;height:34px;border-radius:50%;border:2px solid var(--color-ink);background:var(--color-pop-yellow);font-size:1.1rem;font-weight:900;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:1px 1px 0 var(--color-ink);transition:transform 0.1s;">&plus;</button>
                            </form>

                            <div style="font-size:1.15rem;font-weight:900;color:var(--color-ink);min-width:95px;text-align:right;">
                                Rs. {{ number_format($item['line_total'], 2) }}
                            </div>

                            <form action="{{ route('cart.remove', $p) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="cart-remove-btn" title="Remove item" style="background:none;border:none;color:var(--color-pop-red);font-size:1.5rem;font-weight:900;cursor:pointer;padding:4px 8px;">&times;</button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <!-- 1-CLICK QUICK ADD TO REACH ₹100 (UPSELL CAROUSEL / GRID) -->
                @if(!$minOrderReached && $quickAddStickers->isNotEmpty())
                    <div class="cart-quick-add-section" style="background:#FFFFFF;border:2px dashed var(--color-ink);border-radius:var(--radius-card);padding:22px;box-shadow:var(--shadow-pop-sm);">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;flex-wrap:wrap;gap:8px;">
                            <div style="display:flex;align-items:center;gap:8px;">
                                <span style="font-size:1.3rem;">⚡</span>
                                <h4 style="font-family:var(--font-heading);font-size:1.1rem;font-weight:900;color:var(--color-ink);margin:0;">
                                    Quick Add to Reach Rs. {{ number_format($minOrderAmount, 0) }}
                                </h4>
                                <span style="font-size:0.75rem;background:var(--color-pop-yellow);border:1.5px solid var(--color-ink);padding:2px 8px;border-radius:10px;font-weight:800;">1-Click Add</span>
                            </div>
                            <a href="{{ route('home') }}#shop" style="font-size:0.82rem;font-weight:800;color:var(--color-pop-blue);text-decoration:none;">Browse All Stickers →</a>
                        </div>

                        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(140px, 1fr));gap:14px;">
                            @foreach($quickAddStickers as $quickItem)
                                @php
                                    $qImg = $quickItem->image ? (str_starts_with($quickItem->image, 'http') ? $quickItem->image : (str_starts_with($quickItem->image, 'images/') ? asset($quickItem->image) : asset('storage/'.$quickItem->image))) : null;
                                @endphp
                                <div style="background:var(--color-bg-page);border:2px solid var(--color-ink);border-radius:12px;padding:12px;display:flex;flex-direction:column;align-items:center;text-align:center;box-shadow:2px 2px 0 var(--color-ink);">
                                    <div style="width:58px;height:58px;border-radius:10px;background:#FFF;border:1.5px solid var(--color-ink);display:flex;align-items:center;justify-content:center;overflow:hidden;margin-bottom:8px;">
                                        @if($qImg)
                                            <img src="{{ $qImg }}" alt="{{ $quickItem->name }}" style="max-width:100%;max-height:100%;object-fit:contain;">
                                        @else
                                            <span style="font-size:1.6rem;">{{ $quickItem->emoji ?: '✨' }}</span>
                                        @endif
                                    </div>
                                    <div style="font-weight:800;font-size:0.82rem;color:var(--color-ink);line-height:1.2;margin-bottom:4px;height:2em;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">
                                        {{ $quickItem->name }}
                                    </div>
                                    <div style="font-weight:900;font-size:0.88rem;color:var(--color-pop-red);margin-bottom:8px;">
                                        Rs. {{ number_format($quickItem->price, 0) }}
                                    </div>
                                    <form action="{{ route('cart.add', $quickItem) }}" method="POST" style="width:100%;">
                                        @csrf
                                        <input type="hidden" name="redirect" value="cart">
                                        <button type="submit" class="btn-pop-primary trigger-confetti" data-confetti="true" style="width:100%;padding:6px 10px;font-size:0.75rem;font-weight:900;border-radius:8px;box-shadow:1.5px 1.5px 0 var(--color-ink);">
                                            + Add
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- ORDER SUMMARY ASIDE -->
            <aside class="cart-summary" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:28px;">
                <h3 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:900;text-transform:uppercase;margin-bottom:20px;color:var(--color-ink);">Order Summary</h3>
                <div class="summary-line" style="display:flex;justify-content:space-between;margin-bottom:12px;font-size:0.95rem;font-weight:600;color:var(--color-ink-muted);">
                    <span>Subtotal</span>
                    <b style="color:var(--color-ink);">Rs. {{ number_format($subtotal, 2) }}</b>
                </div>
                <div class="summary-line" style="display:flex;justify-content:space-between;margin-bottom:12px;font-size:0.95rem;font-weight:600;color:var(--color-ink-muted);">
                    <span>Shipping</span>
                    <b style="color:{{ $shipping === 0 ? '#16a34a' : 'inherit' }}">{{ $shipping ? 'Rs. '.number_format($shipping, 2) : 'FREE ⚡' }}</b>
                </div>
                <div class="summary-line total" style="display:flex;justify-content:space-between;border-top:2px solid var(--color-ink);padding-top:16px;margin-top:16px;font-size:1.3rem;font-weight:900;color:var(--color-ink);">
                    <span>Total</span>
                    <b style="color:var(--color-pop-red);">Rs. {{ number_format($total, 2) }}</b>
                </div>

                @if(!$minOrderReached)
                    <!-- Interactive Locked CTA with Shake Alert -->
                    <div class="min-order-warning-box" style="background:#FFF3CD;border:2px solid var(--color-ink);border-radius:12px;padding:12px 14px;margin-top:20px;box-shadow:2px 2px 0 var(--color-ink);">
                        <div style="display:flex;gap:8px;align-items:flex-start;">
                            <span style="font-size:1.2rem;line-height:1;">⚠️</span>
                            <div style="font-size:0.82rem;font-weight:800;color:#856404;line-height:1.35;">
                                Minimum order is <strong>Rs. {{ number_format($minOrderAmount, 2) }}</strong>.<br>
                                Add <strong>Rs. {{ number_format($minOrderDiff, 2) }}</strong> more to place order!
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn-pop-primary btn-checkout-locked" onclick="shakeCartLockedBtn(this)" style="display:flex;justify-content:center;align-items:center;gap:8px;width:100%;margin-top:16px;font-size:1rem;background:#9CA3AF;border-color:var(--color-ink);cursor:pointer;opacity:0.9;box-shadow:3px 3px 0 var(--color-ink);">
                        <span>🔒 Add Rs. {{ number_format($minOrderDiff, 0) }} more to Checkout</span>
                    </button>
                    <div id="locked-tooltip-msg" style="display:none;color:var(--color-pop-red);font-size:0.82rem;font-weight:900;text-align:center;margin-top:8px;">
                        ⚠️ Please add Rs. {{ number_format($minOrderDiff, 2) }} more stickers to checkout!
                    </div>
                @else
                    <a href="{{ route('checkout.create') }}" class="btn-pop-primary" style="display:flex;justify-content:center;width:100%;margin-top:24px;font-size:1.05rem;">
                        Proceed to Checkout →
                    </a>
                @endif

                <a href="{{ route('home') }}#shop" style="display:block; text-align:center; margin-top:16px; font-size:0.88rem; font-weight:800; color:var(--color-pop-blue); text-decoration:none;">
                    ← Add More Stickers
                </a>

                <div style="margin-top:18px;text-align:center;font-size:0.78rem;font-weight:700;color:var(--color-ink-muted);">
                    🔒 Safe &amp; Secure Checkout • 100% Satisfaction
                </div>
            </aside>
        </div>
    @endif
</div>

@push('scripts')
<script>
    function stepCartQty(inputId, delta, formId) {
        var input = document.getElementById(inputId);
        if (!input) return;
        var val = parseInt(input.value) || 1;
        var min = parseInt(input.min) || 1;
        var max = parseInt(input.max) || 20;
        var newVal = val + delta;
        if (newVal >= min && newVal <= max) {
            input.value = newVal;
            var form = document.getElementById(formId);
            if (form) {
                form.submit();
            }
        }
    }

    function shakeCartLockedBtn(btn) {
        btn.classList.add('shake-locked');
        var msg = document.getElementById('locked-tooltip-msg');
        if (msg) {
            msg.style.display = 'block';
        }
        setTimeout(function() {
            btn.classList.remove('shake-locked');
        }, 500);
    }
</script>
@endpush
@endsection
