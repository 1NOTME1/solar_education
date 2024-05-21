@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Komentarze</h1>
        <a href="{{ route('komentarze.create') }}" class="btn btn-primary">Dodaj nowy komentarz</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Treść</th>
                    <th>Post</th>
                    <th>Użytkownik</th>
                    <th>Data publikacji</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($komentarze as $komentarz)
                    <tr>
                        <td>{{ $komentarz->id }}</td>
                        <td>{{ $komentarz->tresc }}</td>
                        <td>{{ $komentarz->post->tresc }}</td>
                        <td>{{ $komentarz->uzytkownik->nazwa_uzytkownika }}</td>
                        <td>{{ $komentarz->data_publikacji }}</td>
                        <td>
                            <a href="{{ route('komentarze.edit', $komentarz->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('komentarze.destroy', $komentarz->id) }}" method="POST" style="display:inline-block;">
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
