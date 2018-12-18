@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Podkategorie</h1>
    <br>
</div>

<!-- <div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('PieczywoController@create') }}" class="btn btn-info">Nowy rodzaj pieczywa</a>
    </div>
</div> -->

<div class="row">
@foreach($subcategories as $subcategory)
@if($subcategory->hidden == 1 && $subcategory->deleted == null)
    <div class="col-md-4 text-center">
    <a href="{{ url('/subcategory/'.$subcategory->id) }}">
        <img src="{{ asset('img/'.$subcategory->picture_file_name) }}"/><br><br>
        <p><strong>{{ $subcategory->name }}</strong></p>
    </a>
        <p>{{ $subcategory->description }}</p>
    </div>
@endif
@endforeach
<div class="col-md-4 text-center">
        <a href="{{ action('SubcategoriesController@create') }}" class="btn btn-primary button-add">
        <span class="button-add-text">+</span>
        </a>
</div>
</div>
@endsection