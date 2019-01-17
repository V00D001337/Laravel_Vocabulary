@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Zestawy</h1>
    <br>
</div>

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
@if($set->deleted == null && $set->subcategories_id == $subcategoryId)
        <tr class='clickable-row' data-href="{{ url('/set/'.$set->id) }}">
            <td>{{$set->name}}</td>
            <td>{{$set->language1->name}}</td>
            <td>{{$set->language2->name}}</td>
        @if (!Auth::guest() && (Auth::user()->redactor && Auth::id() == $set->users_id || Auth::user()->admin || Auth::user()->superRedactor && Auth::user()->getPermission($subcategoryId)))
            <td>
                <a href="{{ url('/subcategory/'.$subcategoryId.'/edit/'.$set->id) }}" class="btn btn-success">Edytuj</a>
                <a href="{{ url('/subcategory/'.$subcategoryId.'/delete/'.$set->id) }}" onclick="return confirm('Jesteś pewien?')"  class="btn btn-danger">Usuń</a>
            </td>
        @endif
        </tr>
@endif
@endforeach
    </tbody>
</table>
@if(!Auth::guest() && (Auth::user()->admin || Auth::user()->redactor && Auth::user()->getPermission($subcategoryId) || Auth::user()->atMostUser))
<a href="{{ action('SetsController@create', $subcategoryId) }}" class="btn btn-info">Nowy zestaw</a>
@endif
@if(Auth::guest() || Auth::user()->atMostUser)
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
@endif

@endsection