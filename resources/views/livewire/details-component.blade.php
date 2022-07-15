@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<section class="padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-lg-6">
                @if (isset($product->images))
                    <article class="gallery-wrap text-center" wire:ignore>
                        <div class="img-big-wrap img-thumbnail slider slider-for">
                            @php
                                $images = explode(',', $product->images);
                            @endphp
                            @foreach ($images as $key => $image)
                                @if ($image)
                                    <a data-fancybox="gallery"
                                        href="{{ asset('images/products') }}/{{ $image }}">
                                        <img src="{{ asset('images/products') }}/{{ $image }}">
                                    </a>
                                @endif
                            @endforeach
                        </div> <!-- img-big-wrap.// -->
                        <div class="thumbs-wrap slider slider-nav">
                            @foreach ($images as $key => $image)
                                @if ($image)
                                    <div>
                                        <div class="item-thumb">
                                            <img width="60" height="60"
                                                src="{{ asset('images/products') }}/{{ $image }}"
                                                alt="{{ $image }}">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div> <!-- thumbs-wrap.// -->
                    </article> <!-- gallery-wrap .end// -->
                @else
                    <div class="img-big-wrap img-thumbnail text-center">
                        <a data-fancybox="mygalley"
                            href="{{ asset('images/products') }}/{{ $product->image }}">
                            <img src="{{ asset('images/products') }}/{{ $product->image }}">
                        </a>
                    </div> <!-- img-big-wrap.// -->
                @endif

            </aside>
            <main class="col-lg-6">
                <article class="ps-lg-3">
                    <h4 class="title text-dark">{{ $product->name }}</h4>
                    <div class="my-3">
                        <span class="label-rating text-success">{{ $product->stock_status }}</span>
                    </div> <!-- rating-wrap.// -->

                    <div class="price-wrap mb-3">
                        @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <strong> <var class="price h4 me-2">{{ $product->sale_price }} MAD</var> </strong>
                            <del class="price-old"> {{ $product->regular_price }} MAD</del>
                        @else
                            <var class="price h4">{{ $product->regular_price }} MAD</var>
                        @endif
                    </div>

                    <p>{!! $product->short_description !!}</p>
                    {{-- <dl class="row">
                        <dt class="col-3">Type:</dt>
                        <dd class="col-9">Regular</dd>

                        <dt class="col-3">Color</dt>
                        <dd class="col-9">Brown</dd>

                        <dt class="col-3">Material</dt>
                        <dd class="col-9">Cotton, Jeans </dd>

                        <dt class="col-3">Brand</dt>
                        <dd class="col-9">Reebook </dd>
                    </dl> --}}

                    <hr>

                    <div class="row mb-4">
                        {{-- <div class="col-md-4 col-6 mb-2">
                            <label class="form-label">Size</label>
                            <select class="form-select">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                            </select>
                        </div> <!-- col.// --> --}}
                        <div class="col-md-4 col-6 mb-3">
                            <label class="form-label d-block">Quantity</label>
                            <div class="input-group input-spinner">
                                <button class="btn btn-icon btn-light" type="button"
                                    wire:click.prevent="decreaseQuantity">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999"
                                        viewBox="0 0 24 24">
                                        <path d="M19 13H5v-2h14v2z"></path>
                                    </svg>
                                </button>
                                <input type="text" class="form-control text-center" pattern="[0-9]*"
                                    wire:model="qty">
                                <button class="btn btn-icon btn-light" type="button"
                                    wire:click.prevent="increaseQuantity">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999"
                                        viewBox="0 0 24 24">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                </button>
                            </div> <!-- input-group.// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->


                    @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                        <button class="btn btn-primary"
                            wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})">
                            <i class="me-1 fa fa-shopping-basket"></i> Ajouter au panier
                        </button>
                    @else
                        <button class="btn btn-primary"
                            wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">
                            <i class="me-1 fa fa-shopping-basket"></i> Ajouter au panier
                        </button>
                    @endif
                    {{-- <a href="#" class="btn  btn-light"> <i class="me-1 fa fa-heart"></i> Save </a> --}}

                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>

<section class="padding-y bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- =================== COMPONENT SPECS ====================== -->
                <div class="card">
                    <header class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#" data-bs-target="#tab_specs" data-bs-toggle="tab"
                                    class="nav-link active">Decription</a>
                            </li>
                        </ul>
                    </header>
                    <div class="tab-content">
                        <article id="tab_specs" class="tab-pane show active card-body">
                            {!! $product->description !!}
                        </article> <!-- tab-content.// -->
                    </div>
                </div>
                <!-- =================== COMPONENT SPECS .// ================== -->
            </div> <!-- col.// -->
            @if ($related_products->count() > 0)
                <aside class="col-lg-4">
                    <!-- =================== COMPONENT ADDINGS ====================== -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Produits similaires</h5>
                            @foreach ($related_products as $r_product)
                                <article class="itemside mb-3">
                                    <a href="{{ route('product.details', ['slug' => $r_product->slug]) }}"
                                        class="aside">
                                        <img src="{{ asset('images/products') }}/{{ $r_product->image }}"
                                            width="96" height="96" class="img-md img-thumbnail">
                                    </a>
                                    <div class="info">
                                        <a href="{{ route('product.details', ['slug' => $r_product->slug]) }}"
                                            class="title mb-1"> {{ $r_product->name }}
                                        </a>
                                        @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <strong class="price h6 me-2">{{ $r_product->sale_price }}</strong>
                                            <del class="price-old"> {{ $r_product->regular_price }} </del>
                                        @else
                                            <strong class="price">{{ $r_product->regular_price }}</strong>
                                        @endif
                                        <!-- price.// -->
                                    </div>
                                </article>
                            @endforeach
                        </div> <!-- card-body .// -->
                    </div> <!-- card .// -->
                    <!-- =================== COMPONENT ADDINGS .// ================== -->
                </aside> <!-- col.// -->
            @endif

        </div>

        <br><br>

    </div><!-- container // -->
</section>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"
        integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 5,
            asNavFor: '.slider-for',
            arrows: true,
            dots: false,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
@endpush
