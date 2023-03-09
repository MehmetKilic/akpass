@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-start">
            @include('component.menu')
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="mt-auto">Update Category</span> <a href="{{route('category.index')}}" class="btn btn-dark float-end">Back</a></div>
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="col-12 mt-4">
                                <form action="{{ route('category.update', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control" name="name" required value="{{ $data->name }}">
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
