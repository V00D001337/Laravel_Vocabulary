@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Zestawy</h1>
    <br>
</div>

<!-- <div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('PieczywoController@create') }}" class="btn btn-info">Nowy rodzaj pieczywa</a>
    </div>
</div> -->

<table>
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Słownictwo</th>
        </tr>
    </thead>
    <tbody>
@foreach($sets as $set)
@if($set->private == 0 && $set->deleted == null)
        <tr>
            <td>{{$set->name}}</td>
            <td>{{$set->language1->name}}o-{{$set->languages2_id}}e</td>
        </tr>
@endif
@endforeach
    </tbody>
</table>
@endsection