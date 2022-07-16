<main class="padding-y bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- ============== COMPONENT 1 =============== -->
                <form wire:submit.prevent="placeOrder">
                    <article class="card">
                        <div class="card-body">

                            <div class="billing_address">
                                <h5 class="card-title">Adresse de facturation </h5>
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
                                            <option value="1">Maroc</option>
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
                                            <span class="form-check-label"> L'adresse de facturation est différente de
                                                l'adresse de livraison
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- row.// -->
                            </div>

                            @if ($ship_to_different)
                                <div class="shipping_address">
                                    <h5 class="card-title"> Adresse de livraison </h5>
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
                                            <input type="text" class="form-control" placeholder="example@gmail.com"
                                                wire:model="s_email">
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
                            <h5 class="card-title"> Mode de livraison </h5>
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <div class="box box-check">
                                        <label class="form-check">
                                            <span class="float-end">
                                                Gratuit
                                            </span>
                                            <input class="form-check-input" type="radio" name="mode_shipping"
                                                checked="">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label">
                                                Livraison Standard
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- col end.// -->
                            </div>
                            <hr class="my-4">
                            <h5 class="card-title"> Méthode de paiment </h5>
                            @if (Session::has('cmi_error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('cmi_error') }}
                                </div>
                            @endif
                            <p>Quels moyens de paiment voulez-vous utiliser ?</p>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <div class="box box-check">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" value="cod"
                                                name="payment-method" wire:model="paymentmode">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Payer comptant à la livraison
                                            </span>
                                        </label>
                                    </div>
                                    @if ($paymentmode == 'cod')
                                        <div class="cod-payment">
                                            <p class="mb-0 mt-2 ms-2">Vous payez lors de la livraison de votre commande
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                <!-- col end.// -->
                                <div class="col-12 mb-3">
                                    <div class="box box-check"> <label class="form-check">
                                            <input class="form-check-input" type="radio" value="card"
                                                name="payment-method" wire:model="paymentmode">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label">CMI, Payer en toute sécurité avec votre
                                                carte bancaire.<img class="ms-2 cmi_cards"
                                                    src="{{ asset('images/cartes.png') }}" alt="">
                                                <small class="text-muted"></small>
                                            </span>
                                        </label>
                                    </div>
                                    @if ($paymentmode == 'card')
                                        <p class="mb-0 mt-2 ms-2">
                                        <ul>
                                            <li>Paiment par cart bancaire (pour éviter tout
                                                contact avec de la monnaire ou des billes)
                                            </li>
                                            <li>
                                                Recommandation sanitaire dans le contexte du COVID-19
                                            </li>
                                        </ul>
                                        </p>
                                    @endif
                                </div>
                                <!-- col end.// -->
                                <div class="col-12 mb-3">
                                    <div class="box box-check"> <label class="form-check">
                                            <input class="form-check-input" type="radio" value="banktransfert"
                                                name="payment-method" wire:model="paymentmode">
                                            <b class="border-oncheck"></b>
                                            <span class="form-check-label"> Paiement par virement bancaire
                                            </span>
                                        </label>
                                    </div>
                                    @if ($paymentmode == 'banktransfert')
                                        <p class="mb-0 mt-2 ms-2">Il vous faudra transférer le montant de la facture
                                            sur
                                            notre compte bancaire.
                                            Vous recevrez votre confirmation de commande par e-mail, comprenant nos
                                            coordonnées bancaires et le numéro de commande. Les biens seront mis de côté
                                            7
                                            jours pour vous et nous traiterons votre commande dès la réception du
                                            paiement.
                                        </p>
                                    @endif

                                </div>
                                <!-- col end.// -->
                                @error('paymentmode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- row end.// -->
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary">Continue</button>
                                <button class="btn btn-light">Annuler</button>
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
                        <h5 class="mb-4">Articles de la commande</h5>
                        @if (Cart::instance('cart')->count() > 0)
                            @foreach (Cart::instance('cart')->content() as $item)
                                <div class="itemside align-items-center mb-4">
                                    <div class="aside"> <b
                                            class="badge bg-secondary rounded-pill">X{{ $item->qty }}</b> <img
                                            src="{{ asset('images/products') }}/{{ $item->model->image }}"
                                            class="img-sm rounded border">
                                    </div>
                                    <div class="info"> <a href="#"
                                            class="title">{{ $item->model->name }}</a>
                                        <div class="price text-muted">{{ $item->model->regular_price }} MAD</div>
                                        <!-- price .// -->
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <hr />
                        @if (Session::has('coupon'))
                            <dl class="dlist-align">
                                <dt>Discount: ({{ Session::get('coupon')['code'] }})</dt>
                                <dd class="text-end text-success"> - {{ Session::get('checkout')['discount'] }} MAD
                                </dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Sous total avec remise :</dt>
                                <dd class="text-end"> {{ Session::get('checkout')['subtotal'] }} MAD</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax ({{ config('cart.tax') }} %):</dt>
                                <dd class="text-end text-danger"> + {{ Session::get('checkout')['tax'] }}
                                    MAD
                                </dd>
                            </dl>
                            {{-- <dl class="dlist-align">
                                <dt>Shipping:</dt>
                                <dd class="text-end"> Free shipping </dd>
                            </dl> --}}
                        @else
                            <dl class="dlist-align">
                                <dt>Sous total :</dt>
                                <dd class="text-end"> {{ Session::get('checkout')['subtotal'] }} MAD</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Tax :</dt>
                                <dd class="text-end text-danger"> + {{ Session::get('checkout')['tax'] }} MAD
                                </dd>
                            </dl>
                            {{-- <dl class="dlist-align">
                                <dt>Shipping:</dt>
                                <dd class="text-end"> Free shipping </dd>
                            </dl> --}}
                        @endif

                        @if (Session::has('checkout'))
                            <hr>
                            <dl class="dlist-align">
                                <dt> Total : </dt>
                                <dd class="text-end text-dark h5"> {{ Session::get('checkout')['total'] }} MAD
                                </dd>
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
