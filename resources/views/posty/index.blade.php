@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posty</h1>
        <a href="{{ route('posty.create') }}" class="btn btn-primary">Dodaj nowy post</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Treść</th>
                    <th>Wątek</th>
                    <th>Użytkownik</th>
                    <th>Data publikacji</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posty jako $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->tresc }}</td>
                        <td>{{ $post->watek->tytul }}</td>
                        <td>{{ $post->uzytkownik->nazwa_uzytkownika }}</td>
                        <td>{{ $post->data_publikacji }}</td>
                        <td>
                            <a href="{{ route('posty.edit', $post->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('posty.destroy', $post->id) }}" method="POST" style="display:inline-block;">
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
