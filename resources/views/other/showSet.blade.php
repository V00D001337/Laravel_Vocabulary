@extends('layouts.app')

@section('content')

<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>{{$set->language1->name}}</th>
            <th>{{$set->language2->name}}</th>
        </tr>
    </thead>
    <tbody>
@foreach($set->getLines() as $line)
    <tr>
    @php
        $words = $set->getWords($line);
    @endphp
        <td>{{$words[0]}}</td>
        <td>{{$words[1]}}</td>
    </tr>
@endforeach
    </tbody>
</table>

@endsection