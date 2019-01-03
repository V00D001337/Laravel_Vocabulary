@extends('layouts.app')

@section('content')

<table class="table text-center table-bordered">
    <thead class="thead-dark">
        <tr>
            <th colspan="3">Wybierz algorytm sprawdzania</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/0') }}">Wymieszaj słówka, jedna próba</a></td>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/1') }}">Wymieszaj słówka, wiele prób</a></td>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/2') }}">Nie mieszaj słówek, wiele prób</a></td>
        </tr>
    </tbody>
</table>

@endsection