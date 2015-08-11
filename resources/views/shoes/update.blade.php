@extends('layout')

@section('content')
    <h1>Post your shoes</h1>

    <div class="row">
        <form action="/shoes/{{ $shoe->id }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Give those bad boys a new name:</label>
                <input type="text" name="name" id="name" class="form-control" value="" placeholder="{{ $shoe->name }}" required>
            </div>

            <hr>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input class="btn btn-primary" type="submit" value="Edit this shoe">
        </form>


    </div>
    <h4>My shoes</h4>
    <ul>
        @foreach ($shoes as $shoe)
            <li><a href="{{ $shoe->id }}">{{ $shoe->name }}</a></li>
        @endforeach
    </ul>


@stop


