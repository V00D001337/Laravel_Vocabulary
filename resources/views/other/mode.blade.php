@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Wybierz tryb:</h1>
    <br>
</div>
<div class="col-md-4 text-center">

    <a href="{{ url('/set/'.$setId.'/mode/0') }}">
        <img src = "{{ asset('img/mode_1.png') }}" />
        <p><strong>Nauka</strong></p>
    </a>
    <a href="{{ url('/set/'.$setId.'/mode/1') }}">
    <img src = "{{ asset('img/mode_2.png') }}" />
    <p><strong>Sprawdzanie Wiedzy</strong></p>
    </a>
</div>

@endsection