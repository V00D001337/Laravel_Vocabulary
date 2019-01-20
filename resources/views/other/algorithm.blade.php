@extends('layouts.app')

@section('content')

<table class="table text-center table-bordered">
    <thead class="thead-dark">
        <tr>
            <th colspan="6">Wybierz algorytm sprawdzania</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/0') }}">Wymieszaj słówka, jedna próba</a></td>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/1') }}">Wymieszaj słówka, wiele prób</a></td>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/2') }}">Nie mieszaj słówek, jedna próba</a></td>
            </tr>
            <tr>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/3') }}">Wymieszaj słówka, jedna próba, podpowiedź pierwsza litera</a></td>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/4') }}">Wymieszaj słówka, jedna próba, podpowiedź ostatnia litera</a></td>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/5') }}">Wymieszaj słówka, jedna próba, wpisywanie po 1 literze</a></td>
            <tr>
            <td width="100px"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/6') }}">Wymieszaj słówka, jedna próba, wpisywanie po 1 literze, podana losowa litera</a></td>
            </tr>
        </tr>
    </tbody>
</table>

@endsection