<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Categories</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('admin.addcategory') }}">Add
                                    category</a>
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
            <div class="app-card app-card-categories-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Category name</th>
                                    <th class="cell">Category slug</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="cell">{{ $category->id }}</td>
                                            <td class="cell">{{ $category->name }}</td>
                                            <td class="cell">{{ $category->slug }}</td>
                                            <td class="cell">
                                                <a
                                                    href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"><i
                                                        class="fas fa-edit"></i>
                                                </a>
                                                <a href="#"
                                                    wire:click.prevent="deleteCategory({{ $category->id }})"><i
                                                        class="fas fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No product found</td>
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
                    {{ $categories->links() }}
                </div>
            </div>
            <!--//app-pagination-->



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
