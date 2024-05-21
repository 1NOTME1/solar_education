@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Zjawiska</h1>
        <a href="{{ route('zjawiska.create') }}" class="btn btn-primary">Dodaj nowe zjawisko</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Data Zjawiska</th>
                    <th>Kategoria</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($zjawiska as $zjawisko)
                    <tr>
                        <td>{{ $zjawisko->id }}</td>
                        <td>{{ $zjawisko->nazwa }}</td>
                        <td>{{ $zjawisko->opis }}</td>
                        <td>{{ $zjawisko->data_zjawiska }}</td>
                        <td>{{ $zjawisko->kategoria->nazwa }}</td>
                        <td>
                            <a href="{{ route('zjawiska.edit', $zjawisko->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('zjawiska.destroy', $zjawisko->id) }}" method="POST" style="display:inline-block;">
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
