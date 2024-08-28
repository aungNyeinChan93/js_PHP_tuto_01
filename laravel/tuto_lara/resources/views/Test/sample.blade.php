@extends('layout.master')

@section('title', 'Sample Page')

@section('header')
    <h4>This is header</h4>
@endsection

@section('body')
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, consequuntur officia. Totam sed praesentium sint
        facilis? Numquam temporibus eveniet soluta neque nam veritatis? Aperiam quibusdam maiores atque eaque soluta minima.
    </p>
@endsection

@section("script")
    <script>
        alert("Hello JS!!!");
        document.body.innerHTML += " JS";

    </script>
@endsection
