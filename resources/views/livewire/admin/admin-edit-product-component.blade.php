<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <a class="action-link" href="{{ route('admin.products') }}"><i class="fas fa-arrow-left"></i> All
                        products</a>
                </div>
                <!--//col-auto-->
            </div>

            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
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
                            <h1 class="app-card-title">Edit product</h1>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    <div class="app-card app-card-settings p-4">
                        <div class="app-card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form class="settings-form" method="POST" enctype="multipart/form-data"
                                wire:submit.prevent="updateProduct">
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" required="" wire:model="name"
                                        wire:keyup="generateslug">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product slug</label>
                                    <input type="text" class="form-control" required="" wire:model="slug">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product short
                                        description</label>
                                    <textarea class="form-control" rows="5" wire:model="short_description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product description</label>
                                    <textarea class="form-control" rows="5" wire:model="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rigular price</label>
                                    <input type="text" class="form-control" wire:model="regular_price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sell price</label>
                                    <input type="text" class="form-control" wire:model="sale_price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SKU</label>
                                    <input type="text" class="form-control" wire:model="sku">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">In stock</option>
                                        <option value="outofstock">Out of stock</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Featured</label>
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" class="form-control" wire:model="quantity">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product image</label>
                                    <input type="file" class="form-control" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="" width="120">
                                    @else
                                        <img src="{{ asset('images/products') }}/{{ $image }}"
                                            alt="" width="120">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn app-btn-primary">Save Changes</button>
                            </form>
                        </div>
                        <!--//app-card-body-->

                    </div>

                </div>

            </div>
            <!--//app-card-->
        </div>
    </div>
</div>
<!--//app-card-->
