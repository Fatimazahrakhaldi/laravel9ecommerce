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
                @if (Session::has('s_success_message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ Session::get('s_success_message') }}
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
                                    <div class="text-center">
                                        <a href="#"
                                            wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">Save for
                                            later</a>
                                    </div>
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


                <hr>

                <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved for later</h2>
                @forelse (Cart::instance('saveForLater')->content() as $item)
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
                                <!-- input-group.// -->
                                <div class="text-center">
                                    <a href="#" wire:click.prevent="moveToCart('{{ $item->rowId }}')">Move
                                        to cart</a>
                                </div>
                            </div>
                            <!-- col.// -->
                            <div class="col"> <strong class="total"> {{ $item->subtotal }} MAD</strong>
                            </div>
                            <div class="col text-end">
                                <a href="" class="btn btn-icon btn-outline-danger"
                                    wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <!-- row.// -->
                    </article>
                @empty
                    <p>No item in cart</p>
                @endforelse
            </div>
            <!-- col.// -->
            <aside class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        @if (!Session::has('coupon'))
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckCoupon"
                                    wire:model="haveCouponCode">
                                <label class="form-check-label" for="flexCheckCoupon">
                                    Have coupon?
                                </label>
                            </div>
                            @if ($haveCouponCode == 1)
                                <form wire:submit.prevent="applyCouponCode">
                                    @if (Session::has('coupon_message'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('coupon_message') }}
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Coupon code" wire:model="couponCode">
                                        <button type="submit" class="btn btn-light">Apply</button>
                                    </div>
                                </form>
                            @endif
                            <hr>
                        @endif
                        <dl class="dlist-align">
                            <dt>Subtotal:</dt>
                            <dd class="text-end"> {{ Cart::instance('cart')->subtotal() }} MAD</dd>
                        </dl>
                        @if (Session::has('coupon'))
                            <dl class="dlist-align">
                                <dt>Discount: ({{ Session::get('coupon')['code'] }})</dt>
                                <dd class="text-end text-success"> - {{ number_format($discount, 2) }} MAD
                                    <a href="#" class="text-danger" wire:click.prevent="removeCoupon"><i class="fa fa-trash"></i></a>
                                </dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Subtotal with discount:</dt>
                                <dd class="text-end"> {{ number_format($subtotalAfterDiscount, 2) }} MAD</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax ({{ config('cart.tax') }} %):</dt>
                                <dd class="text-end text-danger"> + {{ number_format($taxAfterDiscount, 2) }} MAD
                                </dd>
                            </dl>
                            {{-- <dl class="dlist-align">
                                <dt>Shipping:</dt>
                                <dd class="text-end"> Free shipping </dd>
                            </dl> --}}
                            <hr>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-end text-dark h5">{{ number_format($totalAfterDiscount, 2) }} MAD
                                </dd>
                            </dl>
                        @else
                            <dl class="dlist-align">
                                <dt>Tax:</dt>
                                <dd class="text-end text-danger"> + {{ Cart::instance('cart')->tax() }} MAD </dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Shipping:</dt>
                                <dd class="text-end"> Free shipping </dd>
                            </dl>
                            <hr>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-end text-dark h5"> {{ Cart::instance('cart')->total() }} MAD </dd>
                            </dl>
                        @endif
                        <div class="d-grid gap-2 my-3">
                            <a href="{{ url('checkout') }}" class="btn btn-primary w-100"> Checkout </a>
                            <a href="#" class="btn btn-light w-100"> Back to shop </a>
                        </div>
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
