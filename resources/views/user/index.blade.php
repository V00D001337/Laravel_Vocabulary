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
            <th>Dostępne kategorie</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class='clickable-row' data-href="{{ url('/user/edit/'.$user->id) }}">
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if($user->user_role) {{$user->user_role->role->name}} @else Użytkownik @endif</td>
            <td>
            @if(count($user->subcategories) > 0)
                <select multiple name="sub_list">
                    @foreach($user->subcategories as $s)
                    <option value = "{{$s->info->id}}" disabled>
                        {{$s->info->name}}
                    </option>
                    @endforeach
                </select>
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ action('UserController@create') }}" class="btn btn-info">Nowy użytkownik</a>

</div>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

@endsection