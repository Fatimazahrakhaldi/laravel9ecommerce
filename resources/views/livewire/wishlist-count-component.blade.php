<div class="widget-header ms-2">
    <a href="{{ route('produit.wishlist') }}" class="icon icon-sm rounded-circle bg-gray-200">
        <i class="fa fa-heart"></i>
        @if (Cart::instance('wishlist')->count() > 0)
            <span class="notify">{{ Cart::instance('wishlist')->count() }}</span>
        @endif
    </a>
</div>
