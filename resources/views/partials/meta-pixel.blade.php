@if(\App\Services\MetaPixel::enabled(request()))
<script>
    window.tabstickMetaPixelId = {{ Illuminate\Support\Js::from((string) config('services.meta.pixel_id')) }};
</script>
<script src="{{ asset('js/meta-pixel.js') }}"></script>
<script>
    @if(session('meta_add_to_cart'))
        window.tabstickMeta.track('AddToCart', {{ Illuminate\Support\Js::from(session('meta_add_to_cart')) }});
    @endif
    @if(isset($metaViewContent))
        window.tabstickMeta.track('ViewContent', {{ Illuminate\Support\Js::from($metaViewContent) }});
    @endif
    @if(isset($metaCheckout))
        window.tabstickMeta.track('InitiateCheckout', {{ Illuminate\Support\Js::from($metaCheckout) }});
    @endif
    @if(isset($metaPurchase))
        window.tabstickMeta.track('Purchase', {{ Illuminate\Support\Js::from($metaPurchase) }}, {{ Illuminate\Support\Js::from($metaPurchaseId) }});
    @endif
</script>
@endif
