@push('styles')
    <style>
        .countdown {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding: 10px 20px;
            border: 1px solid black;
        }

        .countdown .day,
        .countdown .hour,
        .countdown .min,
        .countdown .sec {
            padding: 20px;
            text-align: center;
        }

        .countdown .day .num,
        .countdown .hour .num,
        .countdown .min .num,
        .countdown .sec .num {
            display: block;
            font-size: 40px;
        }

        .countdown .day .word,
        .countdown .hour .word,
        .countdown .min .word,
        .countdown .sec .word {
            display: block;
            font-size: 20px;
        }
    </style>
@endpush

<main>
    <section class="section-intro padding-top-sm">
        <div class="container">
            <div class="card p-3">
                <div class="row">
                    <aside class="col-lg-3">
                        <nav class="nav flex-column nav-pills">
                            <a class="nav-link active" aria-current="page"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Electronics</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Clothes
                                and
                                wear</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Home
                                interiors</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Computer
                                and
                                tech</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Tools,
                                equipments</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Sports
                                and
                                outdoor</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Animal
                                and
                                pets</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Machinery
                                tools</a>
                            <a class="nav-link"
                                href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/page-index-3.html#">Other
                                products</a>
                        </nav>
                    </aside>
                    <div class="col-lg-9">
                        @foreach ($sliders as $slider)
                            <article class="card-banner p-5 bg-primary"
                                style="height: 360px; background-image: url('{{ asset('images/sliders') }}/{{ $slider->image }}');">
                                <div style="max-width: 500px">
                                    <h2 class="text-white">{{ $slider->title }}</h2>
                                    <p class="text-white">{{ $slider->subtitle }}</p>
                                    {{-- <span class="price">{{ $slider->price }}</span> --}}
                                    <a href="{{ $slider->link }}" class="btn btn-primary"> View more </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>
            </div>
        </div> <!-- container end.// -->
    </section>

    <!-- ================ SECTION PRODUCTS ================ -->
    <section class="padding-y">
        <div class="container">
            <div class="card">
                <header class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        @foreach ($categories as $key => $category)
                            <li class="nav-item">
                                <a href="#" data-bs-target="#category_{{ $category->id }}" data-bs-toggle="tab"
                                    class="nav-link {{ $key == 0 ? 'active' : '' }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </header>
                <div class="tab-content">
                    @foreach ($categories as $key => $category)
                        <article id="category_{{ $category->id }}"
                            class="tab-pane {{ $key == 0 ? 'show active' : '' }} card-body">
                            <div class="row">
                                @foreach ($getProductsByIdCat($category->id, $no_of_products) as $product)
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <figure class="card-product-grid">

                                            <div class="img-wrap">
                                                <span class="topbar">
                                                    <a href="#" class="btn btn-sm btn-light float-end"><i
                                                            class="fa fa-heart"></i></a> <span class="badge bg-danger"> New </span>
                                                </span>
                                                <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                    <img height="250"
                                                        src="{{ asset('images/products') }}/{{ $product->image }}">
                                                    </a>
                                            </div>
                                            <figcaption class="pt-2">
                                                <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                                    class="float-end btn btn-primary btn-icon">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <strong class="price">{{ $product->regular_price }}</strong>
                                                <!-- price.// -->
                                                <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                                    class="title text-truncate">{{ $product->name }}</a>
                                                <small class="text-muted">Model: X-200</small>
                                            </figcaption>
                                        </figure>
                                    </div> <!-- col end.// -->
                                @endforeach

                            </div> <!-- row end.// -->
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ============ COMPONENT BS CARD IMG END .// ============ -->
    <div class="container pt-5">
        <div class="row gy-3">
            <div class="col-lg-4 col-md-6">
                <!-- ============ COMPONENT BANNER 1 ============ -->
                <article class="card-banner"
                    style="height:220px; background-image: url('{{ asset('images/banner4.jpg') }}');">
                    <div class="card-body caption">
                        <h5 class="card-title text-white">Men</h5>
                        <p>No matter how far along you are in your sophistication as an amateur astronomer, there is
                            always
                            one.
                        </p> <a href="#" class="btn btn-primary"> View
                            more
                        </a>
                    </div>
                </article>
                <!-- ============ COMPONENT BANNER 1 END .// ============ -->
            </div>
            <!-- col.// -->
            <div class="col-lg-4 col-md-6">
                <!-- ============ COMPONENT BANNER 2 ============ -->
                <article class="card-banner"
                    style="height:220px; background-image: url('{{ asset('images/banner5.jpg') }}');">
                    <div class="card-body caption">
                        <h5 class="card-title text-white">Women</h5>
                        <p>No matter how far along you are in your sophistication as an amateur astronomer, there is
                            always
                            one.
                        </p> <a href="#" class="btn btn-primary"> View
                            more
                        </a>
                    </div>
                </article>
                <!-- ============ COMPONENT BANNER 2 END .// ============ -->
            </div>
            <!-- col.// -->
            <div class="col-lg-4 col-md-6">
                <!-- ============ COMPONENT BANNER 3 ============ -->
                <article class="card-banner"
                    style="height:220px; background-image: url('{{ asset('images/banner6.jpg') }}');">
                    <div class="card-img-overlay caption">
                        <h5 class="card-title text-white">Kids</h5>
                        <p>No matter how far along you are in your sophistication as an amateur astronomer, there is
                            always
                            one.
                        </p> <a href="#" class="btn btn-primary"> View
                            more
                        </a>
                    </div>
                </article>
                <!-- ============ COMPONENT BANNER 3 END .// ============ -->
            </div>
            <!-- col.// -->
        </div>
    </div>
    <!-- row.// -->

    <!-- ================ SECTION PRODUCTS ================ -->
    <section class="padding-y">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title">New products</h3>
            </header>

            <div class="row">
                @foreach ($lproducts as $lproduct)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <figure class="card-product-grid">
                            <div class="img-wrap">
                                <span class="topbar"> <a href="#" class="btn btn-sm btn-light float-end"><i
                                            class="fa fa-heart"></i></a> <span class="badge bg-danger"> New </span>
                                </span>
                                <a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}">
                                <img height="250"
                                    src="{{ asset('images/products') }}/{{ $lproduct->image }}">
                                </a>
                            </div>
                            <figcaption class="pt-2">
                                <a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}"
                                    class="float-end btn btn-primary btn-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <strong class="price">{{ $lproduct->regular_price }}</strong> <!-- price.// -->
                                <a href="{{ route('product.details', ['slug' => $lproduct->slug]) }}"
                                    class="title text-truncate">{{ $lproduct->name }}</a>
                                <small class="text-muted">Model: X-200</small>
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach

            </div> <!-- row end.// -->

        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION PRODUCTS END.// ================ -->

    @if ($sproducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
        <!-- ================ SECTION PRODUCTS ================ -->
        <section class="container">

            <header class="section-heading">
                <h3 class="section-title">On sale</h3>
            </header>

            <div class="row">
                <div id="countdown" data-expire="{{ Carbon\Carbon::parse($sale->sale_date) }}">
                </div>
                @foreach ($sproducts as $sproduct)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <figure class="card-product-grid">
                            <div class="img-wrap">
                                <span class="topbar">
                                    <a href="#" class="btn btn-sm btn-light float-end"><i
                                            class="fa fa-heart"></i></a> <span class="badge bg-warning"> sale </span>
                                </span>
                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}">
                                    <img height="250"
                                        src="{{ asset('images/products') }}/{{ $sproduct->image }}">
                                    </a>
                            </div>
                            <figcaption class="pt-2">
                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}"
                                    class="float-end btn btn-primary btn-icon"> <i class="fa fa-shopping-cart"></i>
                                </a>
                                <div class="price-wrap mb-3"> <strong class="price"> {{ $sproduct->sale_price }}
                                    </strong> <del class="price-old"> {{ $sproduct->regular_price }} </del> </div>
                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}"
                                    class="title text-truncate">{{ $sproduct->name }}</a>
                                {{-- <small class="text-muted">Sizes: S, M, XL</small> --}}
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach

            </div> <!-- row end.// -->

        </section><!-- container end.// -->
        <!-- ================ SECTION PRODUCTS END.// ================ -->
    @endif

    <section class="padding-y">
        <div class="container">
            <article class="card content-body">
                <div class="row g-5">
                    <div class="col-md-3">
                        <div class="icontext">
                            <div class="icon"> <span class="icon-sm"> <i
                                        class="fa fa-coins fa-lg text-primary"></i>
                                </span>
                            </div>
                            <div class="text">
                                <h6 class="title">Reasonable prices</h6>
                                <p>Have you ever finally just </p>
                            </div>
                        </div>
                        <!-- icontext // -->
                    </div>
                    <!-- col // -->
                    <div class="col-md-3">
                        <div class="icontext">
                            <div class="icon"> <span class="icon-sm"> <i class="fa fa-car fa-lg text-primary"></i>
                                </span>
                            </div>
                            <div class="text">
                                <h6 class="title">Free shipping</h6>
                                <p>Have you ever finally just </p>
                            </div>
                        </div>
                        <!-- icontext // -->
                    </div>
                    <!-- col // -->
                    <div class="col-md-3">
                        <div class="icontext">
                            <div class="icon"> <span class="icon-sm"> <i
                                        class="fa fa-comment-dots fa-lg text-primary"></i>
                                </span> </div>
                            <div class="text">
                                <h6 class="title">24/7 Support</h6>
                                <p>Have you ever finally just </p>
                            </div>
                        </div>
                        <!-- icontext // -->
                    </div>
                    <!-- col // -->
                    <div class="col-md-3">
                        <div class="icontext">
                            <div class="icon"> <span class="icon-sm"> <i class="fa fa-lock fa-lg text-primary"></i>
                                </span> </div>
                            <div class="text">
                                <h6 class="title">Highly secured</h6>
                                <p>Have you ever finally just </p>
                            </div>
                        </div>
                        <!-- icontext // -->
                    </div>
                    <!-- col // -->
                </div>
            </article>
        </div>
    </section>
</main>

@push('scripts')
    <script>
        // Set the date we're counting down
        var countDownDate = new Date(document.getElementById('countdown').getAttribute('data-expire')).getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="countdown"
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endpush
