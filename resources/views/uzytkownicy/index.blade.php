@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Użytkownicy</h1>
        <a href="{{ route('uzytkownicy.create') }}" class="btn btn-primary">Dodaj nowego użytkownika</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa użytkownika</th>
                    <th>Email</th>
                    <th>Rola</th>
                    <th>Data rejestracji</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uzytkownicy as $uzytkownik)
                    <tr>
                        <td>{{ $uzytkownik->id }}</td>
                        <td>{{ $uzytkownik->nazwa_uzytkownika }}</td>
                        <td>{{ $uzytkownik->email }}</td>
                        <td>{{ $uzytkownik->rola->nazwa }}</td>
                        <td>{{ $uzytkownik->data_rejestracji }}</td>
                        <td>
                            <a href="{{ route('uzytkownicy.edit', $uzytkownik->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('uzytkownicy.destroy', $uzytkownik->id) }}" method="POST" style="display:inline-block;">
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
