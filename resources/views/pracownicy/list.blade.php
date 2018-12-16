@extends('../template')
@section('content')
<script>
$(document).ready(function(){    $('.dataTable').DataTable({
    "pageLength": 50
});});
</script>

<div class="page-header" >
<h1>Pracownicy</h1>
</p></div>
<div class="panel panel-default">
<div class="panel-body">
            <a href="{{ action('PracownikController@create') }}" class="btn btn-info">Dodaj pracownika</a>
        </div>
</div>
    @if ($workers->isEmpty())
Nie ma pracownikow!
    @else
<table class="dataTable">
<thead>
<tr>
<th>Imie</th>
<th>Nazwisko</th>
<th>Data urodzenia</th>
<th>Numer telefonu</th>
<th>Pensja</th>
<th>Opcje</th>
</tr>
</thead>
<tbody>
                @foreach($workers as $prac)
<tr>
<td>{{ $prac->imie }}</td>
<td>{{ $prac->nazwisko }}</td>
<td>{{ $prac->data_ur }}</td>
<td>{{ $prac->nr_tel }}</td>
<td>{{ $prac->pensja }}</td>
<td>
                        <a href="{{ action('PracownikController@edit', $prac->id) }}" class="btn btn-default">Edytuj</a>

                        <a href="{{ action('PracownikController@destroy', $prac->id) }}" class="btn btn-danger">Usun</a>
                    </td>
</tr>
                @endforeach
            </tbody>
</table>
    @endif
@stop