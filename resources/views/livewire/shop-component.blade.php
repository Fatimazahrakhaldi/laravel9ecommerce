<main class="padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3">

                <button class="btn btn-outline-secondary mb-3 w-100  d-lg-none" data-bs-toggle="collapse"
                    data-bs-target="#aside_filter">Afficher le filtre</button>

                <!-- ===== Card for sidebar filter ===== -->
                <div id="aside_filter" class="collapse card d-lg-block mb-5">

                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" class="title" data-bs-toggle="collapse"
                                data-bs-target="#collapse_aside1">
                                <i class="icon-control fa fa-chevron-down"></i> Tous les categories
                            </a>
                        </header>
                        <div class="collapse show" id="collapse_aside1">
                            <div class="card-body">
                                <ul class="list-menu">
                                    <li><a href="{{ route('shop') }}">Tous</a></li>
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('shop', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
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
                                <i class="icon-control fa fa-chevron-down"></i> Price <span
                                    class="text-info">{{ $min_price }} - {{ $max_price }}</span>
                            </a>
                        </header>
                        <div class="collapse show pb-5" id="collapse_aside2">
                            <div class="card-body">
                                <div id="slider" wire:ignore></div>
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

                </div> <!-- card.// -->
                <!-- ===== Card for sidebar filter .// ===== -->

            </aside> <!-- col .// -->
            <main class="col-lg-9">
                @if ($category_name)
                    <h1>{{ $category_name }}</h1>
                @endif
                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                    <strong class="d-block py-2">
                        @if ($products->count() > 0)
                            Il y a {{ $products->count() }} produits
                        @endif
                    </strong>
                    <div class="ms-auto">
                        <select class="form-select d-inline-block w-auto" wire:model="sorting">
                            <option value="default" selected="selected">Tri par défaut</option>
                            <option value="date">Nouveaux</option>
                            <option value="price">Prix, croissant</option>
                            <option value="price-desc">Prix, décroissant</option>
                        </select>
                        <select class="form-select d-inline-block w-auto" wire:model="pagesize">
                            <option value="9">9 par page</option>
                            <option value="12">12 par page</option>
                            <option value="21"> 21 par page</option>
                            <option value="100">100 par page</option>
                        </select>
                    </div>
                </header>

                <div class="position-relative">
                    <div class="load" wire:loading>
                        <div class="sticky_loader">
                            <div class="la-timer la-2x">
                                <div></div>
                            </div>
                        </div>
                    </div>

                    <!-- ========= content items ========= -->

                    <div class="row">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6">

                                    <livewire:card-product-component :product="$product" :wire:key="$product->id">

                                </div> <!-- col end.// -->
                            @endforeach
                        @endif
                    </div> <!-- row end.// -->
                </div>


                <footer class="d-flex mt-4 justify-content-center">
                    <nav class="ms-3">
                        {{ $products->links() }}
                    </nav>
                </footer>

                <!-- ========= content items .// ========= -->



            </main> <!-- col .// -->
        </div> <!-- row .// -->

    </div> <!-- container .//  -->
</main>

@push('scripts')
    <script>
        var slider = document.getElementById('slider');

        noUiSlider.create(slider, {
            start: [1, 1000],
            // tooltips: true,
            connect: true,
            range: {
                'min': 0,
                'max': 1000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            },
        });

        slider.noUiSlider.on('update', function(value) {
            @this.set('min_price', value[0]);
            @this.set('max_price', value[1]);
        });
    </script>
@endpush
