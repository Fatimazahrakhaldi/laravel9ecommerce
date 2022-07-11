<div class="widget-header ms-2">
    <a href="{{ route('product.cart') }}" class="icon icon-sm rounded-circle bg-gray-200">
        <i class="fa fa-shopping-cart"></i>
        @if (Cart::instance('cart')->count() > 0)
            <span class="notify">{{ Cart::instance('cart')->count() }}</span>
        @endif
    </a>
    {{-- <div class="dropdown">
        <a href="#" class="icon icon-sm rounded-circle bg-gray-200"
            data-bs-toggle="dropdown">
            <i class="fa fa-shopping-cart"></i>
            @if (Cart::instance('cart')->count() > 0)
                <span class="notify">{{ Cart::instance('cart')->count() }}</span>
            @endif
        </a>
        <div class="dropdown-menu p-3 dropdown-menu-end" style="min-width:300px;">
            <div class="itemside mb-3">
                <div class="aside"><img src="{{ asset('images/manteau.jpg') }}"
                        class="img-sm rounded border"></div>
                <div class="info"> <a
                        href="https://bootstrap-ecommerce.com/components.html#"
                        class="title">Canon Cmera EOS</a> <small class="text-muted">Blue
                        Size: M
                        QTY: 1</small>
                    <div class="price text-muted">$9.50</div>
                    <!-- price .// -->
                </div>
                <div class="flex-grow-0 ms-2"> <a
                        href="https://bootstrap-ecommerce.com/components.html#"
                        class="btn btn-sm btn-light float-end"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="itemside mb-3">
                <div class="aside"><img src="{{ asset('images/manteau.jpg') }}"
                        class="img-sm rounded border"></div>
                <div class="info"> <a
                        href="https://bootstrap-ecommerce.com/components.html#"
                        class="title">Name of item nice iteme</a> <small
                        class="text-muted">Blue
                        Size: M QTY: 1</small>
                    <div class="price text-muted">$9.50</div>
                    <!-- price .// -->
                </div>
                <div class="flex-grow-0 ms-2"> <a
                        href="https://bootstrap-ecommerce.com/components.html#"
                        class="btn btn-sm btn-light float-end"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="itemside mb-3">
                <div class="aside"><img src="{{ asset('images/manteau.jpg') }}"
                        class="img-sm rounded border"></div>
                <div class="info"> <a
                        href="https://bootstrap-ecommerce.com/components.html#"
                        class="title">Name of item nice iteme</a> <small
                        class="text-muted">Blue
                        Size: M QTY: 1</small>
                    <div class="price text-muted">$9.50</div>
                    <!-- price .// -->
                </div>
                <div class="flex-grow-0 ms-2"> <a
                        href="https://bootstrap-ecommerce.com/components.html#"
                        class="btn btn-sm btn-light float-end"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
            <hr>
            <div class="my-3"> Subtotal: <strong
                    class="float-end price">$944.99</strong> </div>
            <a href="{{ route('product.cart') }}" class="btn btn-primary text-white w-100">
                Checkout </a>
        </div>
        <!-- drowpdown-menu.// -->
    </div> --}}
    <!-- dropdown.// -->
</div>
