    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <a class="action-link" href="{{ route('admin.orders') }}"><i class="fas fa-arrow-left"></i> All
                        orders</a>
                </div>
                <!--//col-auto-->
            </div>

            <div class="app-card app-card-account bg-transparent d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder shadow-sm">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                                </svg>
                            </div>
                            <!--//icon-holder-->
                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <h1 class="app-card-title">Detail Order</h1>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                    <div class=" app-card-settings p-4">
                        <div class="app-card-body">

                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                        <div class="app-card-header p-3 border-bottom-0">
                                            <div class="row align-items-center gx-3">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                                        </svg>
                                                    </div><!--//icon-holder-->

                                                </div><!--//col-->
                                                <div class="col-auto">
                                                    <h4 class="app-card-title text-capitalize">ordered items</h4>
                                                </div><!--//col-->
                                                <header class="d-lg-flex">
                                                    <div class="flex-grow-1 mt-2">
                                                      <h6 class="mb-0">Order ID: {{$order->id}}</h6>
                                                      <span class="text-muted">Date: {{ Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</span>
                                                    </div>
                                                </header>
                                            </div><!--//row-->
                                        </div><!--//app-card-header-->
                                        <div class="app-card-body px-4 w-100">
                                            <article class="mb-4">
                                                <div class="card-body row">
                                                        @foreach ( $order->orderItems as $item)

                                                                    <div class="item border-bottom py-3 col-md-6">
                                                                        <a href="{{ route('product.details', ['slug' => $item->product->slug]) }}" class="itemside align-items-center">
                                                                            <figure class="itemside mb-3">
                                                                                <div class="aside">
                                                                                    <b class="badge bg-secondary rounded-pill">{{ $item->quantity }}x</b>
                                                                                    <img width="72" height="72" src="{{ asset('images/products') }}/{{ $item->product->image }}"alt="{{ $item->product->name }}" class="img-sm rounded border">
                                                                                </div>
                                                                                <figcaption class="info">
                                                                                    <p class="item-label">{{ $item->product->name }}</p>
                                                                                    <p class="item-label"><strong> Montant : {{ $item->price }} MAD </strong></p>
                                                                                    <strong> Total : {{ $item->price * $item->quantity }} MAD </strong>
                                                                                </figcaption>
                                                                            </figure>
                                                                        </a>
                                                                    </div>

                                                        @endforeach
                                                </div> <!-- card-body .// -->
                                            </article>
                                            <div class="item mb-4">
                                                <div class="row justify-content-between align-items-center mb-2">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Substotal</strong></div>
                                                        {{-- <div class="item-data">On</div> --}}
                                                    </div><!--//col-->
                                                    <div class="col text-end">
                                                        <p class="item-label mb-0" >{{ $order->subtotal }}</p>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                                <div class="row justify-content-between align-items-center mb-2">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Tax</strong></div>
                                                    </div><!--//col-->
                                                    <div class="col text-end">
                                                        <p class="item-label mb-0" >{{ $order->tax }}</p>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                                <div class="row justify-content-between align-items-center mb-2">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Shipping</strong></div>
                                                    </div><!--//col-->
                                                    <div class="col text-end">
                                                        <p class="item-label mb-0" >Free shipping</p>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                                <div class="row justify-content-between align-items-center mb-2">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Total</strong></div>
                                                    </div><!--//col-->
                                                    <div class="col text-end">
                                                        <p class="item-label mb-0" >{{ $order->total }} MAD</p>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div>
                                        </div><!--//app-card-body-->


                                    </div><!--//app-card-->
                                </div><!--//col-->
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                        <div class="app-card-header p-3 border-bottom-0">
                                            <div class="row align-items-center gx-3">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"></path>
                                                        </svg>
                                                    </div><!--//icon-holder-->

                                                </div><!--//col-->
                                                <div class="col-auto">
                                                    <h4 class="app-card-title text-capitalize">Billing Details</h4>
                                                </div><!--//col-->
                                            </div><!--//row-->
                                        </div><!--//app-card-header-->
                                        <div class="app-card-body px-4 w-100">
                                            <div class="row">
                                                <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>First name </strong></div>
                                                            <div class="item-data">{{ $order->firstname}}</div>
                                                        </div><!--//col-->
                                                    </div><!--//row-->
                                                </div><!--//item-->
                                                <div class="item border-bottom py-3 col-md-6">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Last name</strong></div>
                                                            <div class="item-data">{{ $order->lastname}}</div>
                                                        </div><!--//col-->
                                                    </div><!--//row-->
                                                </div><!--//item-->
                                            </div><!--//row-->
                                            <div class="row">
                                                <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Phone </strong></div>
                                                            <div class="item-data">{{ $order->mobile}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                                <div class="item border-bottom py-3 col-md-6">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Email</strong></div>
                                                            <div class="item-data">{{ $order->email}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                            </div><!--//row-->
                                            <div class="row">
                                                <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Line 1 </strong></div>
                                                            <div class="item-data">{{ $order->line1}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                                <div class="item border-bottom py-3 col-md-6">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Line 2</strong></div>
                                                            <div class="item-data">{{ ($order->line2)??'---'}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                            </div><!--//row-->
                                            <div class="row">
                                                <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>City </strong></div>
                                                            <div class="item-data">{{ ($order->city)??'---'}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                                <div class="item border-bottom py-3 col-md-6">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Country</strong></div>
                                                            <div class="item-data">{{ $order->country}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                            </div><!--//row-->
                                            <div class="row">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Zipcode</strong></div>
                                                            <div class="item-data">{{ ($order->zipcode)??'---'}}</div>
                                                        </div><!--//col-->

                                                    </div><!--//row-->
                                                </div><!--//item-->
                                            </div><!--//row-->

                                        </div><!--//app-card-body-->
                                    </div><!--//app-card-->
                                </div><!--//col-->
                                @if($order->is_shipping_different)

                                    <div class="col-12 col-lg-6">
                                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    <div class="col-auto">
                                                        <div class="app-icon-holder">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"></path>
                                                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                                                            </svg>
                                                        </div><!--//icon-holder-->

                                                    </div><!--//col-->
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title text-capitalize">Shipping Details</h4>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//app-card-header-->
                                            <div class="app-card-body px-4 w-100">
                                                <div class="app-card-body px-4 w-100">
                                                    <div class="row">
                                                        <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>First name </strong></div>
                                                                    <div class="item-data">{{ $order->shipping->firstname}}</div>
                                                                </div><!--//col-->
                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                        <div class="item border-bottom py-3 col-md-6">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Last name</strong></div>
                                                                    <div class="item-data">{{ $order->shipping->lastname}}</div>
                                                                </div><!--//col-->
                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                    </div><!--//row-->
                                                    <div class="row">
                                                        <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Phone </strong></div>
                                                                    <div class="item-data">{{ $order->shipping->mobile}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                        <div class="item border-bottom py-3 col-md-6">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Email</strong></div>
                                                                    <div class="item-data">{{ $order->shipping->email}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                    </div><!--//row-->
                                                    <div class="row">
                                                        <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Line 1 </strong></div>
                                                                    <div class="item-data">{{ $order->shipping->line1}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                        <div class="item border-bottom py-3 col-md-6">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Line 2</strong></div>
                                                                    <div class="item-data">{{ ($order->shipping->line2)??'---'}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                    </div><!--//row-->
                                                    <div class="row">
                                                        <div class="item border-bottom py-3 col-md-6 border-md-end">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>City </strong></div>
                                                                    <div class="item-data">{{ ($order->shipping->city)??'---'}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                        <div class="item border-bottom py-3 col-md-6">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Country</strong></div>
                                                                    <div class="item-data">{{ $order->shipping->country}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                    </div><!--//row-->
                                                    <div class="row">
                                                        <div class="item border-bottom py-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label"><strong>Zipcode</strong></div>
                                                                    <div class="item-data">{{ ($order->shipping->zipcode)??'---'}}</div>
                                                                </div><!--//col-->

                                                            </div><!--//row-->
                                                        </div><!--//item-->
                                                    </div><!--//row-->

                                                </div><!--//app-card-body-->

                                            </div><!--//app-card-body-->

                                            <div class="app-card-footer p-4 mt-auto">
                                            <a class="btn app-btn-secondary" href="#">Manage Security</a>
                                            </div><!--//app-card-footer-->

                                        </div><!--//app-card-->
                                    </div>

                                @endif
                                <div class="col-12 col-lg-6">
                                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                        <div class="app-card-header p-3 border-bottom-0">
                                            <div class="row align-items-center gx-3">
                                                <div class="col-auto">
                                                    <div class="app-icon-holder">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"></path>
                                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"></path>
                                                        </svg>
                                                    </div><!--//icon-holder-->

                                                </div><!--//col-->
                                                <div class="col-auto">
                                                    <h4 class="app-card-title text-capitalize">transaction</h4>
                                                </div><!--//col-->
                                            </div><!--//row-->
                                        </div><!--//app-card-header-->
                                        <div class="app-card-body px-4 w-100">

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label text-capitalize"><strong>transition mode</strong></div>
                                                        <div class="item-data">{{$order->transition->mode??'---'}}</div>
                                                    </div><!--//col-->
                                                    {{-- <div class="col text-end">
                                                        <a class="btn-sm app-btn-secondary" href="#">Edit</a>
                                                    </div><!--//col--> --}}
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label text-capitalize "><strong>status </strong></div>
                                                        <div class="item-data">@if($order->transition)<span class="badge bg-success">{{$order->transition->mode}}@else --- @endif</div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label text-capitalize "><strong>transition date</strong></div>
                                                        <div class="item-data">{{$order->transition->created_at??'---'}}</div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                        </div><!--//app-card-body-->

                                    </div><!--//app-card-->
                                </div>
                            </div>
                        </div>
                        <!--//app-card-body-->

                    </div>

            </div>
            <!--//app-card-->
        </div>
    </div>
</div>
<!--//app-card-->

