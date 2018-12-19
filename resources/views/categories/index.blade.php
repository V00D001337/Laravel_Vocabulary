@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Kategorie</h1>
    <br>
</div>

<!-- <div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('PieczywoController@create') }}" class="btn btn-info">Nowy rodzaj pieczywa</a>
    </div>
</div> -->

<div class="row">
@foreach($categories as $category)
@if($category->hidden == 1 && $category->deleted == null)
    <div class="col-md-4 text-center">
    <a href="{{ url('/category/'.$category->id) }}">
        <img src="{{ asset('img/'.$category->picture_file_name) }}"/><br><br>
        <p><strong>{{ $category->name }}</strong></p>
    </a>
        <p>{{ $category->description }}</p>
        <a href="{{ action('CategoriesController@tryDelete', $category->id) }}" class="btn btn-danger">Usuń</a>
    </div>
@endif
@endforeach
    <div class="col-md-4 text-center">
        <a href="{{ action('CategoriesController@create') }}" onclick="return confirm('Are you sure?')" class="btn btn-primary button-add">
        <span class="button-add-text">+</span>
        </a>
    </div>

</div>
@endsection