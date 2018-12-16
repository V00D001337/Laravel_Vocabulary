@extends('layouts.app')

@section('content')

<script>
$(document).ready(function(){    $('.dataTable').DataTable({
    "pageLength": 5,
    "lengthChange" : false,
    "ordering": false
});});
</script>

<div class="page-header">
    <h1>Pieczywo</h1>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('PieczywoController@create') }}" class="btn btn-info">Nowy rodzaj pieczywa</a>
    </div>
</div>

<table class="dataTable">
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Składniki</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
@foreach($pieczywo as $p)
        <tr>
            <td>{{ $p->nazwa }}</td>
            <td>{{ $p->skladniki }}</td>
            <td>
                <a href="{{ action('PieczywoController@edit', $p->id) }}" class="btn btn-success">Edytuj</a>
                <a href="{{ action('PieczywoController@tryDelete', $p->id) }}" class="btn btn-danger">Usuń</a>
            </td>
        </tr>
@endforeach
    </tbody>
</table>

@endsection