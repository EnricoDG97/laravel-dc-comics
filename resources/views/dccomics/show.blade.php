@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h2>{{$dccomic->title}}</h2>
        <hr>
        <h6>{{$dccomic->description}}</h6>
    </div>
@endsection