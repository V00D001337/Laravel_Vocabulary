@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowy rodzaj pieczywa</h1>
</div>

<form action="{{ action('PieczywoController@store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="nazwa">Nazwa</label>
    <input type="text" class="form-control" name="nazwa" />
</div>
<div class="form-group">
    <label for="skladniki">Składniki</label>
    <textarea class="form-control" name="skladniki"></textarea>
</div>
<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ action('PieczywoController@index') }}" class="btn btn-link">Powrot</a>
</form>

@endsection