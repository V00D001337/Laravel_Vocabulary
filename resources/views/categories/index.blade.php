@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Kategorie</h1>
    <br>
</div>

<div class="row">
@foreach($categories as $category)
@if($category->hidden == 1 && $category->deleted == null)
    <div class="col-md-4 text-center">
    <a href="{{ url('/category/'.$category->id) }}">
        <img src="{{ asset('img/'.$category->picture_file_name) }}"/><br><br>
        <p><strong>{{ $category->name }}</strong></p>
    </a>
        <p>{{ $category->description }}</p>
        <a href="{{ action('CategoriesController@edit', $category->id) }}" class="btn btn-success">Edytuj</a>
        <a href="{{ action('CategoriesController@delete', $category->id) }}" class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</a>
        <br><br>
    </div>
@endif
@endforeach
@if (Auth::user()->user_role->role->id == 1)
    <div class="col-md-4 text-center">
        <a href="{{ action('CategoriesController@create') }}" class="btn btn-primary button-add">
        <span class="button-add-text">+</span>
        </a>
    </div>
@endif

</div>
<div>
    <a href="{{ action('LanguagesController@index') }}" class="btn btn-secondary" style = "width:100%; margin-bottom:25px;">Języki</a>
    <a href="{{ action('UserController@index') }}" class="btn btn-secondary" style = "width:100%; margin-bottom:25px;">Użytkownicy</a>
</div>
@endsection

