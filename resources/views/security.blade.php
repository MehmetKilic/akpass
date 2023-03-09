@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-start">
            @include('component.menu')
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><span class="mt-auto">Security Advice</span></div>
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="col-12 mt-4">
                                A structure can be created with hints about password security for users.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
