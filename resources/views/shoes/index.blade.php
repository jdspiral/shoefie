@extends('layout')


@section('content')
<h1>Shoes</h1>
    @foreach ($shoes as $shoe)
        <img src="{{ $shoe->path }}"><a href="/shoes/{{ $shoe->id }}">{{ $shoe->name }}</a>
    @endforeach

@stop