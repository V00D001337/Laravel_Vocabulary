@extends('layouts.app')

@section('content')

<table class="table text-center table-bordered">
    <thead class="thead-dark">
        <tr>
            <th colspan="2">Wybierz ilość prób</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="50%"><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/0') }}">Jedna</a></td>
            <td><a href="{{ url('/set/'.$setId.'/exam/'.$examId.'/algorithm/1') }}">Wiele</a></td>
        </tr>
    </tbody>
</table>

@endsection