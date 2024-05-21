@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Wątki</h1>
        <a href="{{ route('watki.create') }}" class="btn btn-primary">Dodaj nowy wątek</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tytuł</th>
                    <th>Kategoria</th>
                    <th>Użytkownik</th>
                    <th>Data utworzenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($watki as $watek)
                    <tr>
                        <td>{{ $watek->id }}</td>
                        <td>{{ $watek->tytul }}</td>
                        <td>{{ $watek->kategoria->nazwa }}</td>
                        <td>{{ $watek->uzytkownik->nazwa_uzytkownika }}</td>
                        <td>{{ $watek->data_utworzenia }}</td>
                        <td>
                            <a href="{{ route('watki.edit', $watek->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('watki.destroy', $watek->id) }}" method="POST" style="display:inline-block;">
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
