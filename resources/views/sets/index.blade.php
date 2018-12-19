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

<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th rowspan="2">Nazwa</th>
            <th colspan="2">Tłumaczenie</th>
            <th rowspan="2"></th>
        </tr>
        <tr>
            <th>z</th>
            <th>na</th>
        </tr>
    </thead>
    <tbody>
@foreach($sets as $set)
@if($set->private == 0 && $set->deleted == null)
        <tr>
            <td>{{$set->name}}</td>
            <td>{{$set->language1->name}}</td>
            <td>{{$set->language2->name}}</td>
        </tr>
@endif
@endforeach
    </tbody>
</table>
@endsection