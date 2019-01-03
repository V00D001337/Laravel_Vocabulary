@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Wybierz sposób nauki:</h1>
    <br>
</div>

<table class="table table-hover text-center table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Wybierz sposób nauki</th>
        </tr>
    </thead>
    <tbody>
        <tr class='clickable-row' data-href="{{ url('/set/'.$setId.'/learning') }}">
            <td>
                Wyświetlanie zawartości zestawu
            </td>
        </tr>
        <tr class='clickable-row' data-href="{{ url('/set/'.$setId.'/exam/0') }}">
            <td>
                Tłumaczenie z {{$set->language1->name}} na {{$set->language2->name}}
            </td>
        </tr>
        <tr class='clickable-row' data-href="{{ url('/set/'.$setId.'/exam/1') }}">
            <td>
                Tłumaczenie z {{$set->language2->name}} na {{$set->language1->name}}
            </td>
        </tr>
    </tbody>
</table>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

@endsection