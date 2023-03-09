@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-start">
            @include('component.menu')
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="mt-auto">{{ __('Password Categories') }}</span> <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#createCategory">Create Category</button></div>
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="col-12 mt-4">
                                <h4>My Categories</h4>
                                <table class="table mt-4">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                @if($category->status == 1)
                                                    <span class="badge text-bg-success">Active</span>
                                                @else
                                                    <span class="badge text-bg-danger">Passive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <span class="btn btn-sm btn-danger deleteModal" data-bs-toggle="modal" data-id="{{ $category->id }}" data-bs-target="#deleteModal">Delete</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-5">{{ $categories->links('pagination::bootstrap-5') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('js/password.js')}}"></script>
    @endpush
    <div class="modal" id="createCategory" tabindex="-1" aria-labelledby="createPassword" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Create password modal -->

    <!-- Delete modal -->
    <form id="deleteForm" action="/">
        @csrf
        <div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Uyarı</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <h5>Veriyi silmek istediğinize emin misiniz ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Delete Modal -->


    <script>

        // deleteModal'ı foreach ile dönmek yerine js ile data-id'i append ediyoruz sil butonuna
        $(document).ready(function() {
            $(document).on("click", ".deleteModal", function (data) {
                $('form').attr('action', '/category/delete/'+$(this).data("id"));
            });
        });

        function showPassword(id) {
            let passwordClass = '.password'+id;
            console.log(passwordClass);
            if($(passwordClass).css('display') != "none") {
                $('.password'+id).css('display', 'none');
            }
            else {
                $('.password'+id).css('display', 'block');
            }
        }
    </script>
@endsection
