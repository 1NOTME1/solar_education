@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj komentarz</h1>
        <form action="{{ route('komentarze.update', $komentarz->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tresc">Treść</label>
                <textarea name="tresc" class="form-control" required>{{ $komentarz->tresc }}</textarea>
            </div>
            <div class="form-group">
                <label for="post_id">Post</label>
                <select name="post_id" class="form-control" required>
                    @foreach($posty as $post)
                        <option value="{{ $post->id }}" @if($komentarz->post_id == $post->id) selected @endif>{{ $post->tresc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="uzytkownik_id">Użytkownik</label>
                <select name="uzytkownik_id" class="form-control" required>
                    @foreach($uzytkownicy as $uzytkownik)
                        <option value="{{ $uzytkownik->id }}" @if($komentarz->uzytkownik_id == $uzytkownik->id) selected @endif>{{ $uzytkownik->nazwa_uzytkownika }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
