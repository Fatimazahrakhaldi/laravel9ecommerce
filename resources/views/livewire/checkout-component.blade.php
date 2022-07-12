<main class="padding-y bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- ============== COMPONENT 1 =============== -->
                <form wire:submit.prevent="placeOrder">
                    <article class="card">
                        <div class="card-body">

                            <div class="billing_address">
                                <h5 class="card-title">Billing Address</h5>
                                <div class="row">
                                    <div class="col-6 mb-3"> <label class="form-label">First name</label>
                                        <input type="text" class="form-control" wire:model="firstname">
                                        @error('firstname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-6"> <label class="form-label">Last name</label>
                                        <input type="text" class="form-control" wire:model="lastname">
                                        @error('lastname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-lg-6 mb-3"> <label class="form-label">Phone</label>
                                        <input type="text" value="+212" class="form-control" wire:model="mobile">
                                        @error('mobile')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-lg-6 mb-3"> <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="example@gmail.com"
                                            wire:model="email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-4 mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-select" wire:model="country">
                                            <option value="1">New York</option>
                                            <option value="2">Moscow</option>
                                            <option value="3">Samarqand</option>
                                        </select>
                                        @error('country')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-4 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" wire:model="city">
                                        @error('city')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-4 mb-3">
                                        <label class="form-label">Postal code / Zip</label>
                                        <input type="text" class="form-control" wire:model="zipcode">
                                        @error('zipcode')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- col end.// -->
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Line1</label>
                                        <input type="text" class="form-control" wire:model="line1">
                                        @error('line1')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Line2</label>
                                        <input type="text" class="form-control" wire:model="line2">
                                        @error('line2')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                wire:model="ship_to_different">
                                            <span class="form-check-label"> Ship to a different address ? </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- row.// -->
                            </div>

                            @if ($ship_to_different)
                                <div class="shipping_address">
                                    <h5 class="card-title">Shipping Address</h5>
                                    <div class="row">
                                        <div class="col-6 mb-3"> <label class="form-label">First name</label>
                                            <input type="text" class="form-control" wire:model="s_firstname">
                                            @error('s_firstname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-6"> <label class="form-label">Last name</label>
                                            <input type="text" class="form-control" wire:model="s_lastname">
                                            @error('s_lastname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-lg-6 mb-3"> <label class="form-label">Phone</label>
                                            <input type="text" value="+212" class="form-control"
                                                wire:model="s_mobile">
                                            @error('s_mobile')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-lg-6 mb-3"> <label class="form-label">Email</label>
                                            <input type="text" class="form-control"
                                                placeholder="example@gmail.com" wire:model="s_email">
                                            @error('s_email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-4 mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="form-select" wire:model="s_country">
                                                <option value="1">New York</option>
                                                <option value="2">Moscow</option>
                                                <option value="3">Samarqand</option>
                                            </select>
                                            @error('s_country')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-4 mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" wire:model="s_city">
                                            @error('s_city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-4 mb-3">
                                            <label class="form-label">Postal code / Zip</label>
                                            <input type="text" class="form-control" wire:model="s_zipcode">
                                            @error('s_zipcode')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- col end.// -->
                                        <div class="col-6 mb-3">
                                            <label class="form-label">Line1</label>
                                            <input type="text" class="form-control" wire:model="s_line1">
                                            @error('s_line1')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label">Line2</label>
                                            <input type="text" class="form-control" wire:model="s_line2">
                                            @error('s_line2')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- row.// -->
                                </div>
                            @endif
                            <hr class="my-4">
                            <h5 class="card-title"> Shipping info </h5>
                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <div class="box box-check">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="dostavka"
                                                checked="">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Express delivery <br>
                                                <small class="text-muted">3-4 days via Fedex </small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                                <div class="col-lg-4 mb-3">
                                    <div class="box box-check"> <label class="form-check">
                                            <input class="form-check-input" type="radio" name="dostavka"> <b
                                                class="border-oncheck"></b>
                                            <span class="form-check-label"> Post office <br>
                                                <small class="text-muted">20-30 days via post</small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                                <div class="col-lg-4 mb-3">
                                    <div class="box box-check"> <label class="form-check">
                                            <input class="form-check-input" type="radio" name="dostavka">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Self pick-up
                                                <br>
                                                <small class="text-muted"> Come to our shop </small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                            </div>
                            <hr class="my-4">
                            <h5 class="card-title"> Payment method </h5>
                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <div class="box box-check">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" value="cod" name="payment-method"
                                                wire:model="paymentmode">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Cash on delivery <br>
                                                <small class="text-muted">Order now pay on delivery </small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                                <div class="col-lg-4 mb-3">
                                    <div class="box box-check"> <label class="form-check">
                                            <input class="form-check-input" type="radio" value="card" name="payment-method"
                                                >
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Debit / Credit Card <br>
                                                <small class="text-muted"></small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                                <div class="col-lg-4 mb-3">
                                    <div class="box box-check"> <label class="form-check">
                                            <input class="form-check-input" type="radio" value="paypal" name="payment-method"
                                               >
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Paypal
                                                <br>
                                                <small class="text-muted"> Come to our shop </small>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                                @error('paymentmode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- row end.// -->
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary">Continue</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                        <!-- card-body end.// -->
                    </article>
                    <!-- card end.// -->
                </form>

                <!-- ============== COMPONENT 1 .// =============== -->
            </div>
            <!-- col.// -->
            <aside class="col-lg-4">
                <!-- ============== COMPONENT SUMMARY =============== -->
                <article class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Items in cart</h5>
                        <div class="itemside align-items-center mb-4">
                            <div class="aside"> <b class="badge bg-secondary rounded-pill">2</b> <img
                                    src="{{ asset('images/manteau.jpg') }}" class="img-sm rounded border">
                            </div>
                            <div class="info"> <a href="https://bootstrap-ecommerce.com/components.html#"
                                    class="title">Canon Cmera EOS, 10x zoom</a>
                                <div class="price text-muted">Total: $12.99</div>
                                <!-- price .// -->
                            </div>
                        </div>
                        <div class="itemside align-items-center mb-4">
                            <div class="aside"> <b class="badge bg-secondary rounded-pill">2</b> <img
                                    src="{{ asset('images/manteau.jpg') }}" class="img-sm rounded border">
                            </div>
                            <div class="info"> <a href="https://bootstrap-ecommerce.com/components.html#"
                                    class="title">Leather Wallet for Men Original</a>
                                <div class="price text-muted">Total: $12.99</div>
                                <!-- price .// -->
                            </div>
                        </div>
                        <div class="itemside align-items-center mb-4">
                            <div class="aside"> <b class="badge bg-secondary rounded-pill">2</b> <img
                                    src="{{ asset('images/manteau.jpg') }}" class="img-sm rounded border">
                            </div>
                            <div class="info"> <a href="https://bootstrap-ecommerce.com/components.html#"
                                    class="title">Product name goes here</a>
                                <div class="price text-muted">Total: $12.99</div>
                                <!-- price .// -->
                            </div>
                        </div>
                        <hr />
                        <h5 class="card-title">Summary</h5>
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-end"> $1403.97</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-end text-danger"> - $60.00 </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Shipping cost:</dt>
                            <dd class="text-end"> + $14.00 </dd>
                        </dl>
                        @if (Session::has('checkout'))
                            <hr>
                        <dl class="dlist-align">
                            <dt> Total: </dt>
                            <dd class="text-end"> <strong class="text-dark">{{Session::get('checkout')['total']}}</strong> </dd>
                        </dl>
                        @endif

                    </div>
                </article>
                <!-- ============== COMPONENT SUMMARY .// =============== -->
            </aside>
            <!-- col.// -->
        </div>
        <!-- row.// -->
    </div>
    <!-- container end.// -->
</main>
