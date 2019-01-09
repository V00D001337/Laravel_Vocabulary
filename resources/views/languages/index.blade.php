@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Języki</h1>
    <br>
</div>

<table class="table table-hover table-bordered">
    <thead class = "thead-dark">
        <tr>
            <th rowspan = "2">Nazwa</th>
            <th rowspan = "2">Symbol</th>
            <th rowspan = "2"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($languages as $language)
    @if($language->private == 0 && $language->deleted == null)
    <tr>
        <td>{{$language->name}}</td>
        <td>{{$language->symbol}}</td>
        <td>
        <a href="{{ action('LanguagesController@edit', $language->id) }}" class="btn btn-success">Edytuj</a>
        <a href="{{ action('LanguagesController@destroy', $language->id) }}" onclick="return confirm('Jesteś pewien?')"  class="btn btn-danger">Usuń</a>
        </td>
    </tr>
    @endif
    @endforeach
    </tbody>
</table>
<a href="{{ action('LanguagesController@create') }}" class="btn btn-info">Nowy język</a>



@endsection