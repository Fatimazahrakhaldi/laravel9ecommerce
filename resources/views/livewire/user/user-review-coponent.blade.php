<main class="padding-y bg-light">
    <div class="container">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <h4>Add reviw for :</h4>
                {{-- <div class=" card-product-list">
                    <div class="row g-0">
                        <aside class="col-xl-3 col-lg-4 col-md-12 col-12"> <a href="#" class="img-wrap"> <img
                                    src="{{ asset('images/products') }}/{{ $orderItem->product->image }}"> </a>
                        </aside> <!-- col.// -->
                        <div class="col-xl-6 col-lg col-md-7 col-sm-7">
                            <div class="card-body"> <a href="#" class="title"> {{ $orderItem->product->name }}
                                </a>
                                <div class="rating-wrap mb-2">
                                    <ul class="rating-stars">
                                        <li class="stars-active" style="width: 90%;"> <img
                                                src="bootstrap5-ecommerce/images/misc/stars-active.svg" alt="">
                                        </li>
                                        <li> <img src="bootstrap5-ecommerce/images/misc/starts-disable.svg"
                                                alt="">
                                        </li>
                                    </ul>
                                </div> <!-- rating-wrap.// -->

                            </div> <!-- card-body.// -->
                        </div> <!-- col.// -->

                    </div> <!-- row.// -->
                </div> --}}
                <div class="itemside mb-3 mt-3"> <a href="#" class="aside"><img
                            src="{{ asset('images/products') }}/{{ $orderItem->product->image }}"
                            class="border img-md"></a>
                    <div class="info"> <a href="{{ route('product.details', ['slug' => $orderItem->product->slug]) }}" class="title">{{ $orderItem->product->name }}</a> </div>
                </div>
                <form wire:submit.prevent="addReview">
                    <div class="mb-3">
                        <div class="container d-flex justify-content-start">
                            <div class="row">

                                <div class="col-md-12">
                                    <label class="label-control">Your rating : </label>
                                    <div class="stars">

                                        <input class="star star-5" id="star-5" type="radio" name="rating"
                                            value="5" wire:model="rating" />

                                        <label class="star star-5" for="star-5"></label>

                                        <input class="star star-4" id="star-4" type="radio" name="rating"
                                            value="4" wire:model="rating" />

                                        <label class="star star-4" for="star-4"></label>

                                        <input class="star star-3" id="star-3" type="radio" name="rating"
                                            value="3" wire:model="rating" />

                                        <label class="star star-3" for="star-3"></label>

                                        <input class="star star-2" id="star-2" type="radio" name="rating"
                                            value="2" wire:model="rating" />

                                        <label class="star star-2" for="star-2"></label>

                                        <input class="star star-1" id="star-1" type="radio" name="rating"
                                            value="1" wire:model="rating" />

                                        <label class="star star-1" for="star-1"></label>
                                        @error('rating')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>



                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="label-control">Your rating : </label>
                        <textarea class="form-control" wire:model="comment"></textarea>
                        @error('comment')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row mb-3 gy-2 gx-3 align-items-center">
                    </div> <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>


</main>
