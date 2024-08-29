@extends('admin.layout')

@section('admin')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form action=" {{ url('admin/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <input type="text" name="name" class="form-control my-2" placeholder="Enter your name...">
                    <input type="email" name="email" class="form-control my-2" placeholder="Enter your email...">
                    <input type="file" name="photo" class="form-control my-2">
                    <input type="submit" value="Submit" class="btn btn-sm btn-success">
                    <a class="btn btn-sm btn-info" href="{{url("admin/index")}}">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
