@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Użytkownicy</h1>
    <br>
</div>

<table class="table text-center table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Nazwa</th>
            <th>Email</th>
            <th>Typ</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

@endsection