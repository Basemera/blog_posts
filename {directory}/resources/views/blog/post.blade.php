@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">Learning Laravel</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <h1>The title is {{ $post['title'] }}</h1>
            <p>{{ $post['content'] }}</p>
        </div>
    </div>
@endsection