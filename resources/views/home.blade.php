@extends('layouts.app')

@section('content')
<div class="container">
    <div class="float-start">
    @include('component.menu')
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span class="mt-auto">{{ __('Dashboard') }}</span> <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#createPassword">Create Password</button></div>
                <div class="card-body">
                        <div class="container-fluid">
                            <div class="col-12 mt-4">
                                <h4>My Passwords</h4>
                                <table class="table mt-4" id="dataList">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($passwords as $password)
                                    <tr>
                                        <th scope="row">{{ $password->id }}</th>
                                        <td>{{ $password->title }}</td>
                                        <td>{{ $password->url }}</td>
                                        <td>{{ $password->username }}</td>
                                        <td class="w-25">
                                            <span class="password{{$password->id}}" style="display: none;">{{ $password->password }}</span>
                                            <i class="fa fa-eye fa-xl" aria-hidden="true" onclick="showPassword({{$password->id}})"></i>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('password.show', $password->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <span class="btn btn-sm btn-danger deleteModal" data-bs-toggle="modal" data-id="{{ $password->id }}" data-bs-target="#deleteModal">Delete</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-5">{{ $passwords->links('pagination::bootstrap-5') }}</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script src="{{ asset('js/password.js')}}"></script>
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.3/sb-1.4.0/sp-2.1.1/datatables.min.css" rel="stylesheet"/>

    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.3/sb-1.4.0/sp-2.1.1/datatables.min.js"></script>
@endpush
<div class="modal" id="createPassword" tabindex="-1" aria-labelledby="createPassword" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('password.store') }}" method="POST">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" name="url" required>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" required>
                            <button type="button" class="btn btn-outline-secondary col-12 mt-2" name="passwordGenerate">🔑 Generate Password </button>
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
            $('form').attr('action', '/password/delete/'+$(this).data("id"));
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

    $(function () {
        $('#dataList').DataTable({
            "dom": '<"#exportButton"B><"#searchInput.col-md-12"f>rt<"#searchPagination"p><"clear">',
            "paging": true,
            "processing": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
