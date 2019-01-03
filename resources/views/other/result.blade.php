@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Wyniki:</h1>
    <br>
</div>

<table class="table text-center table-bordered">
    <tbody>
    @if($algorithmId == 0)
        <tr>
            <td width="50%">Poprawność odpowiedzi</td>
            <td>{{$rate}}%</td>
        </tr>
        <tr>
            <td>Współczynnik poprawności</td>
            <td>{{$score}}/{{$bestScore}}</td>
        </tr>
    @else
        <tr>
            <td width="50%">Ilość błędnych odpowiedzi</td>
            <td>{{$incorrect}}</td>
        </tr>
    @endif
    </tbody>
</table>

<br>

<a href="{{ url('/set/'.session('setId').'/exam/'.session('examId').'/algorithm/'.$algorithmId) }}" class="btn btn-primary">Ponów próbę</a>
<a href="{{ url('/subcategory/'.session('subcategoryId')) }}" class="btn btn-primary">Inne zestawy</a>

@endsection