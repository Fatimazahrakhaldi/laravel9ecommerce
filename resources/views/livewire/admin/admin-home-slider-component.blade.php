<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Sliders</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('admin.addhomeslider') }}">Ajouter un nouveau slide</a>
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
                                    <th class="cell">Image</th>
                                    <th class="cell">Title</th>
                                    <th class="cell">Subtitle</th>
                                    <th class="cell">Price</th>
                                    <th class="cell">Link</th>
                                    <th class="cell">Status </th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sliders->count() > 0)
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td class="cell">{{ $slider->id }}</td>
                                            <td class="cell"><img
                                                    src="{{ asset('images/sliders/' . $slider->image) }}"
                                                    alt="{{ $slider->name }}" style="width: 120px;" /></td>
                                            <td class="cell">{{ $slider->title }}</td>
                                            <td class="cell">{{ $slider->subtitle }}</td>
                                            <td class="cell">{{ $slider->price }}</td>
                                            <td class="cell">{{ $slider->link }}</td>
                                            <td class="cell">{{ $slider->status == 1 ? 'Active' : 'Inactive'}}</td>
                                            <td class="cell">{{ $slider->created_at }}</td>
                                            <td class="cell">
                                                <a
                                                    href="{{ route('admin.edithomeslider', ['slide_id' => $slider->id]) }}"><i
                                                        class="fas fa-edit"></i>
                                                </a>
                                                <a href="#"
                                                    wire:click.prevent="deleteSlide({{ $slider->id }})"><i
                                                        class="fas fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">pas de slider</td>
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
                    {{-- {{ $sliders->links() }} --}}
                </div>
            </div>
            <!--//app-pagination-->
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->
