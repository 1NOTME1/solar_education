@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj post</h1>
        <form action="{{ route('posty.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tresc">Treść</label>
                <textarea name="tresc" class="form-control" required>{{ $post->tresc }}</textarea>
            </div>
            <div class="form-group">
                <label for="watek_id">Wątek</label>
                <select name="watek_id" class="form-control" required>
                    @foreach($watki as $watek)
                        <option value="{{ $watek->id }}" @if($post->watek_id == $watek->id) selected @endif>{{ $watek->tytul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="uzytkownik_id">Użytkownik</label>
                <select name="uzytkownik_id" class="form-control" required>
                    @foreach($uzytkownicy as $uzytkownik)
                        <option value="{{ $uzytkownik->id }}" @if($post->uzytkownik_id == $uzytkownik->id) selected @endif>{{ $uzytkownik->nazwa_uzytkownika }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
