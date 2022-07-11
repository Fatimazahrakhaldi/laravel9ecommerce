<main class="padding-y bg-light">
    <div class="container">
        <!-- ====================== COMPONENT 2 CART+SUMMARY ====================== -->
        <div class="row">
            <div class="col-md-9">

                @if (Session::has('success_message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ Session::get('success_message') }}
                    </div>
                @endif
                @if (Cart::instance('cart')->count() > 0)
                    <button class="btn btn-light" type="button" wire:click.prevent="destroyAll()">
                        Destroy cart
                    </button>
                    @foreach (Cart::instance('cart')->content() as $item)
                        <article class="card card-body mb-3">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-6">
                                    <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                        class="itemside align-items-center">
                                        <div class="aside">
                                            <img src="{{ asset('images/products') }}/{{ $item->model->image }}"
                                                height="72" alt="{{ $item->model->name }}" width="72"
                                                class="img-thumbnail img-sm">
                                        </div>
                                        <div class="info">
                                            <p class="title">{{ $item->model->name }}</p>
                                            <span class="text-muted">Clothes</span>
                                            <span class="price">{{ $item->model->regular_price }} MAD</span>
                                        </div>
                                    </a>
                                </div>
                                <!-- col.// -->
                                <div class="col-auto">
                                    <div class="input-group input-spinner">
                                        <button class="btn btn-light btn-decrease" type="button"
                                            wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#999" viewBox="0 0 24 24">
                                                <path d="M19 13H5v-2h14v2z"></path>
                                            </svg>
                                        </button>
                                        <input type="text" class="form-control"
                                            data-max="{{ $item->model->quantity }}" value="{{ $item->qty }}"
                                            pattern="[0-9]">
                                        <button class="btn btn-light btn-increase" type="button"
                                            wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#999" viewBox="0 0 24 24">
                                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- input-group.// -->
                                </div>
                                <!-- col.// -->
                                <div class="col"> <strong class="total"> {{ $item->subtotal }} MAD</strong>
                                </div>
                                <div class="col text-end">
                                    <a href="" class="btn btn-icon btn-outline-danger"
                                        wire:click.prevent="destroy('{{ $item->rowId }}')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- row.// -->
                        </article>
                    @endforeach

                    <div class="card">
                        <div class="card-body border-top">
                            <div class="icontext">
                                <div class="icon">
                                    <span class="icon-sm">
                                        <i class="me-2 text-muted fa-lg fa fa-truck"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <h6 class="title">Free Delivery within 1-2 weeks</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna al</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>No item in cart</p>
                @endif

            </div>
            <!-- col.// -->
            <aside class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="input-group mb-3"> <input type="text" class="form-control"
                                placeholder="Promo code">
                            <button class="btn btn-light text-primary">Apply</button>
                        </div> --}}
                        <dl class="dlist-align">
                            <dt>Subtotal:</dt>
                            <dd class="text-end"> {{ Cart::instance('cart')->subtotal() }} MAD</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Tax:</dt>
                            <dd class="text-end"> {{ Cart::instance('cart')->tax() }} MAD</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Shipping:</dt>
                            <dd class="text-end"> Free shipping </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-end text-dark h5"> {{ Cart::instance('cart')->total() }} MAD </dd>
                        </dl>
                        <hr>
                        <a href="{{ url('checkout') }}" class="btn btn-primary mb-2 w-100">Checkout</a>
                        <a href="#" class="btn btn-light w-100"> Back to shop </a>
                    </div>
                    <!-- card-body.// -->
                </div>
                <!-- card.// -->
            </aside>
            <!-- col.// -->
        </div>
        <!-- row.// -->
        <!-- =================== COMPONENT 2 CART+SUMMARY END .// ====================== -->
    </div>
</main>
