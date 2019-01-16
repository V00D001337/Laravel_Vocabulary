@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Kategorie</h1>
    <br>
</div>

<div class="row">
@foreach($categories as $category)
@if($category->deleted == null)
    <div class="col-md-4 text-center">
    <a href="{{ url('/category/'.$category->id) }}">
        <img src="{{ asset('img/'.$category->picture_file_name) }}"/><br><br>
        <p><strong>{{ $category->name }}</strong></p>
    </a>
        <p>{{ $category->description }}</p>
        @if (!Auth::guest() && Auth::user()->admin)
        <a href="{{ action('CategoriesController@edit', $category->id) }}" class="btn btn-success">Edytuj</a>
        <a href="{{ action('CategoriesController@delete', $category->id) }}" class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</a>
        @endif
        <br><br>
    </div>
@endif
@endforeach
@if (!Auth::guest() && Auth::user()->admin)
    <div class="col-md-4 text-center">
        <a href="{{ action('CategoriesController@create') }}" class="btn btn-primary button-add">
        <span class="button-add-text">+</span>
        </a>
    </div>
@endif

</div>
@endsection

