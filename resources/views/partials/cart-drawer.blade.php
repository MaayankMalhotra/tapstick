<!-- ==========================================================================
     LIGHTNING-FAST SLIDE-OUT CART DRAWER (TABSTICK NATIVE EXPERIENCE)
     ========================================================================== -->
<div id="cart-drawer-backdrop" class="cart-drawer-backdrop" onclick="closeCartDrawer()" aria-hidden="true"></div>

<aside id="cart-drawer" class="cart-drawer" role="dialog" aria-modal="true" aria-labelledby="cart-drawer-title" aria-hidden="true">
    <!-- 1. Drawer Header -->
    <div class="cart-drawer-header">
        <div class="cart-drawer-header-left">
            <h2 id="cart-drawer-title" class="cart-drawer-title">YOUR CART</h2>
        </div>
        <div class="cart-drawer-header-right">
            <span id="cart-drawer-count-label" class="cart-drawer-count-label">
                {{ ($headerCartCount ?? 0) === 1 ? '1 STICKER' : ($headerCartCount ?? 0).' STICKERS' }}
            </span>
            <button type="button" class="cart-drawer-close-btn" onclick="closeCartDrawer()" aria-label="Close cart drawer">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <!-- 2. Free Shipping / Minimum Order Goal Progress Bar -->
    <div id="cart-drawer-goal-wrap" class="cart-drawer-goal-wrap">
        @php
            $sub = $headerCartSubtotal ?? 0;
            $minOrder = 100;
            $freeShip = 499;
            $isMinReached = $sub >= $minOrder;
            $minDiff = max(0, $minOrder - $sub);
            $freeDiff = max(0, $freeShip - $sub);
            $freeProgress = $sub > 0 ? min(100, round(($sub / $freeShip) * 100)) : 0;
            $minProgress = $sub > 0 ? min(100, round(($sub / $minOrder) * 100)) : 0;
        @endphp
        
        <div class="drawer-goal-text-row">
            <span class="drawer-goal-icon">🚚</span>
            <div class="drawer-goal-message" id="drawer-goal-message">
                @if($sub == 0)
                    <span>Add stickers to unlock <strong>Free Delivery</strong> &amp; Checkout!</span>
                @elseif(!$isMinReached)
                    <span>Add <strong>₹{{ number_format($minDiff, 2) }}</strong> more to reach <strong>₹100 min order</strong></span>
                @elseif($sub < $freeShip)
                    <span>🎉 Min order reached! Add <strong>₹{{ number_format($freeDiff, 2) }}</strong> for <strong>FREE Shipping</strong></span>
                @else
                    <span>🚀 You've unlocked <strong>FREE Pan-India Shipping!</strong></span>
                @endif
            </div>
        </div>

        <div class="drawer-goal-progress-bar">
            <div id="drawer-goal-progress-fill" class="drawer-goal-progress-fill" style="width: {{ $sub >= $freeShip ? 100 : ($isMinReached ? max(15, $freeProgress) : max(8, $minProgress)) }}%;"></div>
        </div>
    </div>

    <!-- 3. Scrollable Cart Items Body -->
    <div id="cart-drawer-body" class="cart-drawer-body">
        @include('partials.cart-drawer-items', [
            'items' => isset($drawerItems) ? $drawerItems : (isset($items) ? $items : ($headerCartItems ?? [])),
            'subtotal' => $headerCartSubtotal ?? 0,
        ])
    </div>

    <!-- 4. Sticky Bottom Footer -->
    <div class="cart-drawer-footer" id="cart-drawer-footer">
        <!-- Discount Code Input -->
        <form id="drawer-coupon-form" class="drawer-coupon-form" onsubmit="handleDrawerCoupon(event)">
            @csrf
            <div class="drawer-coupon-input-group">
                <input 
                    type="text" 
                    id="drawer-coupon-input" 
                    name="code" 
                    placeholder="Discount code" 
                    value="{{ session('coupon.code') ?? '' }}"
                    autocomplete="off" 
                    spellcheck="false"
                    class="drawer-coupon-input"
                >
                <button type="submit" class="drawer-coupon-btn" id="drawer-coupon-btn">
                    APPLY
                </button>
            </div>
            <div id="drawer-coupon-feedback" class="drawer-coupon-feedback" style="display:none;"></div>
        </form>

        <!-- Subtotal Row -->
        <div class="drawer-summary-row">
            <span class="drawer-summary-label">SUBTOTAL</span>
            <span class="drawer-summary-amount" id="drawer-subtotal-val">
                ₹{{ number_format($headerCartSubtotal ?? 0, 2) }}
            </span>
        </div>

        <!-- Checkout Action Button (Dynamic Minimum Order vs Proceed) -->
        <div class="drawer-checkout-wrap" id="drawer-checkout-wrap">
            @if($sub < $minOrder)
                <button type="button" class="btn-drawer-min-order" id="btn-drawer-checkout-action" onclick="closeCartDrawer(); window.location.href='{{ route('home') }}#shop';">
                    <span id="drawer-btn-label">₹{{ number_format($minDiff > 0 ? $minDiff : $minOrder, 2) }} MORE TO CHECKOUT</span>
                </button>
            @else
                <a href="{{ route('checkout.create') }}" class="btn-drawer-checkout" id="btn-drawer-checkout-action">
                    <span>PROCEED TO CHECKOUT ➔</span>
                </a>
            @endif
        </div>

        <!-- Micro Trust Perks -->
        <div class="drawer-trust-row">
            <span>🔒 Secure Razorpay Checkout</span>
            <span>•</span>
            <span>💧 100% Waterproof</span>
            <span>•</span>
            <span>⚡ Fast Dispatch</span>
        </div>
    </div>
</aside>
