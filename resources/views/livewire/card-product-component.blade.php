<div>
<figure class="card card-product-grid">
    <div class="img-wrap">
        <span class="topbar">
            @if ($witems->contains($product->id))
                <a href="#"
                    wire:click.prevent="removeFromWishlist({{ $product->id }})"
                    class="btn btn-sm btn-light float-end"><i
                        class="fa fa-heart"></i></a>
            @else
                <a href="#"
                    wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"
                    class="btn btn-sm btn-light float-end"><i
                        class="fa-regular fa-heart"></i></a>
            @endif
        </span>
        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
            <img src="{{ asset('images/products') }}/{{ $product->image }}"
                alt="{{ $product->name }}">
        </a>
    </div>
    <figcaption class="info-wrap border-top">
        <button class="float-end btn btn-primary btn-icon"
            wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">
            <i class="fa fa-shopping-cart"></i>
        </button>
        <div class="price-wrap">
            @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                <strong class="price h6 me-2">{{ $product->sale_price }} MAD</strong>
                <del class="price-old"> {{ $product->regular_price }} MAD</del>
            @else
                <strong class="price">{{ $product->regular_price }} MAD</strong>
            @endif
        </div> <!-- price-wrap.// -->

        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
            <p class="title">{{ $product->name }}</p>
        </a>
    </figcaption>
</figure>
</div>
