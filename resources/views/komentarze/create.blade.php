@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nowy komentarz</h1>
        <form action="{{ route('komentarze.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tresc">Treść</label>
                <textarea name="tresc" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="post_id">Post</label>
                <select name="post_id" class="form-control" required>
                    @foreach($posty as $post)
                        <option value="{{ $post->id }}">{{ $post->tresc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="uzytkownik_id">Użytkownik</label>
                <select name="uzytkownik_id" class="form-control" required>
                    @foreach($uzytkownicy as $uzytkownik)
                        <option value="{{ $uzytkownik->id }}">{{ $uzytkownik->nazwa_uzytkownika }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
