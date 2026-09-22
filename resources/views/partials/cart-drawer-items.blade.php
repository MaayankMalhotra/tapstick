@if(empty($items) || count($items) === 0)
    <div class="drawer-empty-state">
        <div class="empty-icon-wrap">
            <span class="empty-icon">🛍️</span>
        </div>
        <h3 class="empty-title">Your cart is empty</h3>
        <p class="empty-desc">Discover 4,500+ waterproof, scratchproof vinyl stickers built to stick for years.</p>
        <button type="button" class="btn-drawer-explore" onclick="closeCartDrawer(); window.location.href='{{ route('home') }}#shop';">
            <span>Explore Drops ⚡</span>
        </button>
    </div>
@else
    <div class="drawer-items-list">
        @foreach($items as $item)
            @php
                $p = $item['product'];
                $quantity = $item['quantity'];
                $imgSrc = $p->image ? (str_starts_with($p->image, 'http') ? $p->image : (str_starts_with($p->image, 'images/') ? asset($p->image) : asset('storage/'.$p->image))) : null;
                $regularPrice = round($p->price * 1.5, 0);
            @endphp
            <div class="drawer-item-row" id="drawer-item-{{ $p->id }}">
                <div class="drawer-item-thumb">
                    @if($imgSrc)
                        <img src="{{ $imgSrc }}" alt="{{ $p->name }} Sticker" loading="lazy">
                    @else
                        <span class="drawer-item-emoji">{{ $p->emoji ?: '✨' }}</span>
                    @endif
                </div>

                <div class="drawer-item-content">
                    <div class="drawer-item-top">
                        <h4 class="drawer-item-title">
                            <a href="{{ route('products.show', $p) }}">{{ $p->name }}</a>
                        </h4>
                        <button type="button" class="drawer-item-remove-btn" onclick="removeDrawerItem({{ $p->id }})" title="Remove item" aria-label="Remove {{ $p->name }}">
                            Remove
                        </button>
                    </div>

                    <div class="drawer-item-specs">
                        <span class="drawer-item-tag">3x3 Inch • Waterproof Vinyl</span>
                    </div>

                    <div class="drawer-item-bottom">
                        <div class="drawer-item-pricing">
                            <span class="drawer-item-strike">₹{{ number_format($regularPrice, 0) }}</span>
                            <span class="drawer-item-price">₹{{ number_format($p->price, 2) }}</span>
                        </div>

                        <!-- Stepper [-] [ QTY ] [+] -->
                        <div class="drawer-qty-stepper">
                            <button type="button" class="drawer-qty-btn minus" onclick="updateDrawerQty({{ $p->id }}, {{ $quantity - 1 }})" aria-label="Decrease quantity" @if($quantity <= 1) title="Remove item" @endif>&minus;</button>
                            <span class="drawer-qty-val">{{ $quantity }}</span>
                            <button type="button" class="drawer-qty-btn plus" onclick="updateDrawerQty({{ $p->id }}, {{ $quantity + 1 }})" aria-label="Increase quantity" @if($quantity >= min(20, $p->stock)) disabled style="opacity:0.4;cursor:not-allowed;" @endif>&plus;</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
