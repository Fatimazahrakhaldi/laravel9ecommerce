<main class="padding-y">
    <div class="container">
        <h1>{{ $category_name }}</h1>
        <div class="row">
            <aside class="col-lg-3">

                <button class="btn btn-outline-secondary mb-3 w-100  d-lg-none" data-bs-toggle="collapse"
                    data-bs-target="#aside_filter">Show filter</button>

                <!-- ===== Card for sidebar filter ===== -->
                <div id="aside_filter" class="collapse card d-lg-block mb-5">

                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" class="title" data-bs-toggle="collapse"
                                data-bs-target="#collapse_aside1">
                                <i class="icon-control fa fa-chevron-down"></i> All categories
                            </a>
                        </header>
                        <div class="collapse show" id="collapse_aside1">
                            <div class="card-body">
                                <ul class="list-menu">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse.// -->
                    </article> <!-- filter-group // -->

                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" class="title" data-bs-toggle="collapse"
                                data-bs-target="#collapse_aside_brands">
                                <i class="icon-control fa fa-chevron-down"></i> Brands
                            </a>
                        </header>
                        <div class="collapse show" id="collapse_aside_brands">
                            <div class="card-body">
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label"> Mercedes </span>
                                    <b class="badge rounded-pill bg-gray-dark float-end">120</b>
                                </label> <!-- form-check end.// -->

                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label"> Toyota </span>
                                    <b class="badge rounded-pill bg-gray-dark float-end">15</b>
                                </label> <!-- form-check end.// -->

                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label"> Mitsubishi </span>
                                    <b class="badge rounded-pill bg-gray-dark float-end">35</b>
                                </label> <!-- form-check end.// -->

                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label"> Nissan </span>
                                    <b class="badge rounded-pill bg-gray-dark float-end">89</b>
                                </label> <!-- form-check end.// -->

                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label"> Honda </span>
                                    <b class="badge rounded-pill bg-gray-dark float-end">30</b>
                                </label> <!-- form-check end.// -->

                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label"> Honda accord </span>
                                    <b class="badge rounded-pill bg-gray-dark float-end">30</b>
                                </label> <!-- form-check end.// -->
                            </div> <!-- card-body .// -->
                        </div> <!-- collapse.// -->
                    </article>

                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" class="title" data-bs-toggle="collapse"
                                data-bs-target="#collapse_aside2">
                                <i class="icon-control fa fa-chevron-down"></i> Price
                            </a>
                        </header>
                        <div class="collapse show" id="collapse_aside2">
                            <div class="card-body">
                                <input type="range" class="form-range" min="0" max="100">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="min" class="form-label">Min</label>
                                        <input class="form-control" id="min" placeholder="$0" type="number">
                                    </div> <!-- col end.// -->

                                    <div class="col-6">
                                        <label for="max" class="form-label">Max</label>
                                        <input class="form-control" id="max" placeholder="$1,0000" type="number">
                                    </div> <!-- col end.// -->
                                </div> <!-- row end.// -->
                                <button class="btn btn-light w-100" type="button">Apply</button>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse.// -->
                    </article> <!-- filter-group // -->

                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" class="title" data-bs-toggle="collapse"
                                data-bs-target="#collapse_aside3">
                                <i class="icon-control fa fa-chevron-down"></i> Size
                            </a>
                        </header>
                        <div class="collapse show" id="collapse_aside3">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> XS </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> SM </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> LG </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> XXL </span>
                                </label>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse.// -->
                    </article> <!-- filter-group // -->

                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" class="title" data-bs-toggle="collapse"
                                data-bs-target="#collapse_aside4">
                                <i class="icon-control fa fa-chevron-down"></i> Ratings
                            </a>
                        </header>
                        <div class="collapse show" id="collapse_aside4">
                            <div class="card-body">

                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label">
                                        <ul class="rating-stars">
                                            <li class="stars-active" style="width: 100%;">
                                                <img src="images/misc/stars-active.svg" alt="">
                                            </li>
                                            <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
                                        </ul>
                                    </span>
                                </label> <!-- form-check end.// -->
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label">
                                        <ul class="rating-stars">
                                            <li class="stars-active" style="width: 80%;">
                                                <img src="images/misc/stars-active.svg" alt="">
                                            </li>
                                            <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
                                        </ul>
                                    </span>
                                </label> <!-- form-check end.// -->
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label">
                                        <ul class="rating-stars">
                                            <li class="stars-active" style="width: 60%;">
                                                <img src="images/misc/stars-active.svg" alt="">
                                            </li>
                                            <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
                                        </ul>
                                    </span>
                                </label> <!-- form-check end.// -->
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                    <span class="form-check-label">
                                        <ul class="rating-stars">
                                            <li class="stars-active" style="width: 40%;">
                                                <img src="images/misc/stars-active.svg" alt="">
                                            </li>
                                            <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
                                        </ul>
                                    </span>
                                </label> <!-- form-check end.// -->


                            </div> <!-- card-body.// -->
                        </div> <!-- collapse.// -->
                    </article> <!-- filter-group // -->

                </div> <!-- card.// -->
                <!-- ===== Card for sidebar filter .// ===== -->

            </aside> <!-- col .// -->
            <main class="col-lg-9">

                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                    <strong class="d-block py-2">32 Items found </strong>
                    <div class="ms-auto">
                        <select class="form-select d-inline-block w-auto" wire:model="sorting">
                            <option value="default" selected="selected">Default sorting</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price ASC</option>
                            <option value="price-desc">Sort by price DESC</option>
                        </select>
                        <select class="form-select d-inline-block w-auto" wire:model="pagesize">
                            <option value="9">9 per page</option>
                            <option value="12">12 per page</option>
                            <option value="21"> 21 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                        <div class="btn-group">
                            <a href="#" class="btn btn-light" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="List view">
                                <i class="fa fa-bars"></i>
                            </a>
                            <a href="#" class="btn btn-light active" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Grid view">
                                <i class="fa fa-th"></i>
                            </a>
                        </div> <!-- btn-group end.// -->
                    </div>
                </header>

                <!-- ========= content items ========= -->
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <span class="topbar"> <a href="#" class="btn btn-sm btn-light float-end"><i class="fa fa-heart"></i></a> </span>
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        <img src="{{ asset('images/products') }}/{{ $product->image }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <figcaption class="info-wrap border-top">
                                    <div class="price-wrap">
                                        <strong class="price">{{ $product->regular_price }}</strong>
                                        <del class="price-old">$170.00</del>
                                    </div> <!-- price-wrap.// -->
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        <p class="title mb-2">{{ $product->name }}</p>
                                    </a>

                                    <button class="btn btn-primary"
                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                        to cart</button>
                                    <a href="#" class="btn btn-light btn-icon"> <i class="fa fa-heart"></i>
                                    </a>
                                </figcaption>
                            </figure>
                        </div> <!-- col end.// -->
                    @endforeach
                </div> <!-- row end.// -->

                <hr>

                <footer class="d-flex mt-4">
                    <div>
                        <a href="javascript: history.back()" class="btn btn-light"> « Go back</a>
                    </div>
                    <nav class="ms-3">
                        {{ $products->links() }}
                    </nav>
                </footer>

                <!-- ========= content items .// ========= -->



            </main> <!-- col .// -->
        </div> <!-- row .// -->

    </div> <!-- container .//  -->
</main>
