@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły komentarza</h1>
        <div class="form-group">
            <label for="tresc">Treść</label>
            <p>{{ $komentarz->tresc }}</p>
        </div>
        <div class="form-group">
            <label for="post_id">Post</label>
            <p>{{ $komentarz->post->tresc }}</p>
        </div>
        <div class="form-group">
            <label for="uzytkownik_id">Użytkownik</label>
            <p>{{ $komentarz->uzytkownik->nazwa_uzytkownika }}</p>
        </div>
        <a href="{{ route('komentarze.index') }}" class="btn btn-primary">Powrót</a>
    </div>
@endsection
