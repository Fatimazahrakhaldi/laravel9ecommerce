<main class="padding-y">
    <div class="container">
        <h1 class="text-center mb-5">Articles sauvegardés</h1>
        @if (Cart::instance('wishlist')->content()->count() > 0)
            <div class="row">
                @foreach (Cart::instance('wishlist')->content() as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <span class="topbar">
                                    <a href="#" wire:click.prevent="removeFromWishlist({{ $item->model->id }})"
                                        class="btn btn-sm btn-light float-end"><i class="fa fa-trash-alt"></i></a>
                                </span>
                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                    <img src="{{ asset('images/products') }}/{{ $item->model->image }}"
                                        alt="{{ $item->model->name }}">
                                </a>
                            </div>
                            <figcaption class="info-wrap border-top">
                                <button class="float-end btn btn-primary btn-icon"
                                    wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowId }}')">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <div class="price-wrap">
                                    {{-- @if ($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <strong class="price h6 me-2">{{ $item->model->sale_price }}</strong>
                                        <del class="price-old"> {{ $item->model->regular_price }} </del>
                                    @else --}}
                                    <strong class="price">{{ $item->model->regular_price }}</strong>
                                    {{-- @endif --}}
                                </div> <!-- price-wrap.// -->

                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                    <p class="title">{{ $item->model->name }}</p>
                                </a>


                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach
            </div> <!-- row end.// -->
        @else
            <div class="text-center">
                <p>
                    Aucun produit trouvé
                </p>
            </div>
        @endif
    </div>
</main>
