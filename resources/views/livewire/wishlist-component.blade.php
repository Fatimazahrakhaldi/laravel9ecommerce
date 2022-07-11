<main class="padding-y">
    <div class="container">
        @if (Cart::instance('wishlist')->content()->count() > 0)
            <div class="row">
                @foreach (Cart::instance('wishlist')->content() as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <span class="topbar">
                                    <a href="#" wire:click.prevent="removeFromWishlist({{ $item->model->id }})"
                                        class="btn btn-sm btn-light float-end"><i class="fa fa-heart"></i></a>
                                </span>
                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                    <img src="{{ asset('images/products') }}/{{ $item->model->image }}"
                                        alt="{{ $item->model->name }}">
                                </a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <div class="price-wrap">
                                    {{-- @if ($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <strong class="price h6 me-2">{{ $item->model->sale_price }}</strong>
                                        <del class="price-old"> {{ $item->model->regular_price }} </del>
                                    @else --}}
                                        <strong class="price">{{ $item->model->regular_price }}</strong>
                                    {{-- @endif --}}
                                </div> <!-- price-wrap.// -->

                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                    <p class="title mb-2">{{ $item->model->name }}</p>
                                </a>

                                <button class="float-end btn btn-primary btn-icon"
                                    wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowId }}')">
                                    Move to cart
                                </button>
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach
            </div> <!-- row end.// -->
        @else
            <p>No items in wishlist</p>
        @endif
    </div>
</main>
