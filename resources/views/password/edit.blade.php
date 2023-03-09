@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-start">
            @include('component.menu')
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="mt-auto">Update Password</span> <a href="{{route('home')}}" class="btn btn-dark float-end">Back</a></div>
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="col-12 mt-4">
                                <form action="{{ route('password.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" required value="{{ $data->title }}">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="url">Url</label>
                                            <input type="text" class="form-control" name="url" required value="{{ $data->url }}">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" class="form-control" required>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $data->category_id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" required value="{{ $data->username }}">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" name="password" required  value="{{ $data->password }}">
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                    <button type="button" class="btn btn-outline-secondary col-12" name="passwordGenerate">🔑 Generate Password </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-warning col-12 btn-lg">Update</button>
                                        </div>
                                    </div>
                                </form>
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

@endsection
