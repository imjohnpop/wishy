@extends('index')

@section('content')

    @foreach($wishes_with_m as $wish)
        <h2>{{$wish->name}}</h2>
    @endforeach

@endsection