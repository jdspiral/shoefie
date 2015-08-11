@extends('layout')



@section('content')
    <h1>{{ $shoe->name }}</h1>
    <br/>



    @foreach ($shoe->photos as $photo)
        <img src="{{ $photo->path }}"/>
    @endforeach
    <form action="/shoes/{{ $shoe->id }}/photos" class="dropzone" method="POST">
        {{ csrf_field() }}
    </form>
    <br/>

        <a href="/shoes/{{ $shoe->id }}/edit"><button class="btn btn-primary">Edit this shoe</button></a>


    <form action="/shoes/{{ $shoe->id }}" method="POST">
        <input name="_method" type="hidden" value="DELETE">
        {{ csrf_field() }}
        <input class="btn btn-danger" type="submit" value="Delete this shoe">
    </form>


@stop

