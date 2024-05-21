@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kategorie Forum</h1>
        <a href="{{ route('kategorie_forum.create') }}" class="btn btn-primary">Dodaj nową kategorię</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategorie_forum as $kategoria)
                    <tr>
                        <td>{{ $kategoria->id }}</td>
                        <td>{{ $kategoria->nazwa }}</td>
                        <td>
                            <a href="{{ route('kategorie_forum.edit', $kategoria->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('kategorie_forum.destroy', $kategoria->id) }}" method="POST" style="display:inline-block;">
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
