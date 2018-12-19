@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj Podkategorię</h1>
</div>

<form action="{{ action('{{ url('/category/'.$categoryId.'/update') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" value="{{$subcategories->name}}" name="name" />
</div>
<div class="form-group">
    <label for="description">Opis</label>
    <input type="text" class="form-control" value="{{$subcategories->description}}" name="description" />
</div>
<div class="form-group">
    <label for="picture_file_name">Podaj nazwę obrazka z pliku public/img/...</label>
    <input type="text" class="form-control" value="{{$subcategories->picture_file_name}}" name="picture_file_name" />
</div>
<input type="submit" value="Wykonaj" class="btn btn-primary" />
<a href="{{ url('/category/'.$categoryId) }}" class="btn btn-link">Anuluj</a>
</form>

@endsection