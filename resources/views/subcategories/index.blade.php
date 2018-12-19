@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Podkategorie</h1>
    <br>
</div>

<div class="row">
@foreach($subcategories as $subcategory)
@if($subcategory->hidden == 1 && $subcategory->deleted == null)
    <div class="col-md-4 text-center">
    <a href="{{ url('/subcategory/'.$subcategory->id) }}">
        <img src="{{ asset('img/'.$subcategory->picture_file_name) }}"/><br><br>
        <p><strong>{{ $subcategory->name }}</strong></p>
    </a>
        <p>{{ $subcategory->description }}</p>
        <a href="{{ url('/category/'.$categoryId.'/edit/'.$subcategory->id) }}" class="btn btn-success">Edytuj</a>
        <a href="{{ url('/category/'.$categoryId.'/delete/'.$subcategory->id) }}" onclick="return confirm('Jesteś pewien?')"  class="btn btn-danger">Usuń</a>
    </div>
@endif
@endforeach
<div class="col-md-4 text-center">
        <a href="{{ url('/category/'.$categoryId.'/create') }}" class="btn btn-primary button-add">
        <span class="button-add-text">+</span>
        </a>
</div>
</div>
@endsection