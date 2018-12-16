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
    <h1>Piekarze</h1>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('PiekarzController@create') }}" class="btn btn-info">Nowy piekarz</a>
    </div>
</div>

<table class="dataTable">
    <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Data zatrudnienia</th>
            <th>Specjalność</th>
            <th>Ubezpieczenie</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
@foreach($piekarz as $p)
        <tr>
            <td>{{ $p->imie }}</td>
            <td>{{ $p->nazwisko }}</td>
            <td>{{ $p->data_zatrudnienia }}</td>
            <td>{{ $p->nazwa }}</td>
            <td>@if($p->ubezpieczenie == 1) Tak @else Nie @endif</td>
            <td>
                <a href="{{ action('PiekarzController@edit', $p->id) }}" class="btn btn-success">Edytuj</a>
                <a href="{{ action('PiekarzController@tryDelete', $p->id) }}" class="btn btn-danger">Usuń</a>
            </td>
        </tr>
@endforeach
    </tbody>
</table>

@endsection