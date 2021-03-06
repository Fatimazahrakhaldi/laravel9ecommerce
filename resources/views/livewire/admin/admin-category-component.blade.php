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
                                                <button type="button" wire:click="deleteId({{ $category->id }})"
                                                    class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#delete_confirm">
                                                    <i class="fas fa-trash-can"></i>
                                                </button>
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

                <!-- Modal -->
                <div class="modal fade" id="delete_confirm" tabindex="-1" aria-labelledby="delete_confirmLabel"
                    aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete_confirmLabel">Delete Confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" wire:click.prevent="deleteCategory()"
                                    class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
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

@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            var myModalEl = document.getElementById('delete_confirm')
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        });
    </script>
@endpush
