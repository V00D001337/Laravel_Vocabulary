@extends('layouts.app')

@section('content')

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
                {{$set->language1->name}} na {{$set->language2->name}}
            </td>
        </tr>
        <tr class='clickable-row' data-href="{{ url('/set/'.$setId.'/exam/1') }}">
            <td>
                {{$set->language2->name}} na {{$set->language1->name}}
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