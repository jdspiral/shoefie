@extends('layout')

@section('content')
<h1>Post your shoes</h1>

    <div class="row">
        <form method="POST" action="/shoes" enctype="multipart/form-data" class="col-md-6">
            @include('shoes.form')

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>


    </div>
<h4>My shoes</h4>
<ul>
    @foreach ($shoes as $shoe)
        <li><a href="{{ $shoe->id }}">{{ $shoe->name }}</a></li>
    @endforeach
</ul>


@stop
