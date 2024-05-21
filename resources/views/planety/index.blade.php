@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Planety</h1>
        <a href="{{ route('planety.create') }}" class="btn btn-primary">Dodaj nową planetę</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Typ</th>
                    <th>Masa</th>
                    <th>Odległość od Słońca</th>
                    <th>Opis</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planety as $planeta)
                    <tr>
                        <td>{{ $planeta->id }}</td>
                        <td>{{ $planeta->nazwa }}</td>
                        <td>{{ $planeta->typ }}</td>
                        <td>{{ $planeta->masa }}</td>
                        <td>{{ $planeta->odleglosc_od_slonca }}</td>
                        <td>{{ $planeta->opis }}</td>
                        <td>
                            <a href="{{ route('planety.edit', $planeta->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('planety.destroy', $planeta->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
