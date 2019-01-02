@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Wybierz tryb:</h1>
    <br>
</div>

<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/mode/0') }}">
        Nauka
    </a>
</div>
<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/mode/1') }}">
        Sprawdzanie wiedzy
    </a>
</div>

@endsection