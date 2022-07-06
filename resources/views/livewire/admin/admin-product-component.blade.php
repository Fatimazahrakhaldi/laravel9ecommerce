<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Products</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('admin.addproduct') }}">Add
                                    product</a>
                            </div>
                        </div>
                        <!--//row-->
                    </div>
                    <!--//table-utilities-->
                </div>
                <!--//col-auto-->
            </div>

            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="app-card app-card-products-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Image</th>
                                    <th class="cell">Name</th>
                                    <th class="cell">Stock</th>
                                    <th class="cell">Price</th>
                                    <th class="cell">Category</th>
                                    <th class="cell">Date </th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="cell">{{ $product->id }}</td>
                                            <td class="cell"><img
                                                    src="{{ asset('backend/images/products') }}/{{ $product->image }}"
                                                    alt="{{ $product->image }}" width="60"></td>
                                            <td class="cell">{{ $product->name }}</td>
                                            <td class="cell">{{ $product->stock_status }}</td>
                                            <td class="cell">{{ $product->regular_price }}</td>
                                            <td class="cell">{{ $product->category->name }}</td>
                                            <td class="cell">{{ $product->created_at }}</td>
                                            <td class="cell">
                                                <a
                                                    href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}"><i
                                                        class="fas fa-edit"></i>
                                                </a>
                                                <a href="#"
                                                    wire:click.prevent="deleteProduct({{ $product->id }})"><i
                                                        class="fas fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No product found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->

                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
            <div class="app-pagination">
                <div class="pagination justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
            <!--//app-pagination-->



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <footer class="app-footer">
        <div class="container text-center py-3">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                    style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com"
                    target="_blank">Xiaoying Riley</a> for developers</small>

        </div>
    </footer>
    <!--//app-footer-->

</div>
<!--//app-wrapper-->
