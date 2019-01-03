@extends('layouts.app')

@section('content')

<form action="{{ url('/exam') }}" method="post" role="form" autocomplete="off">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>{{$l1}}</th>
            <th>{{$l2}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$word}}</td>
            <td><input type="text" class="form-control" name="word" /></td>
        </tr>
    </tbody>
</table>

<input type="submit" value="Dalej" class="btn btn-primary" />
</form>

@endsection