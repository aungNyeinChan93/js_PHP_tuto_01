@extends('admin.layout')

@section('admin')
    <div class="container p-5 my-4">
        <a class="btn btn-info my-3" href="{{ url("admin/create") }}"> Create</a>
        <div class="row">

            @foreach ($admins as $admin)
                <div class="col-4 my-3">
                    <div class="card card-body h-100 p-3 shadow -bottom-3 ">
                        <h4>{{ $admin->name }}</h4>
                        <h5>{{ $admin->email }}</h5>
                        <img class=" img-fluid" src="{{ asset("/adminImage/$admin->photo") }}" alt="photo">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
