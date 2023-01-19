@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 class="display-3">Jumbo heading</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg text-uppercase" href="{{route('admin.projects.index')}}" role="button">view my projects</a>
        </p>
    </div>
</div>
@endsection