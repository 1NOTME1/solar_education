@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nowy post</h1>
        <form action="{{ route('posty.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tresc">Treść</label>
                <textarea name="tresc" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="watek_id">Wątek</label>
                <select name="watek_id" class="form-control" required>
                    @foreach($watki as $watek)
                        <option value="{{ $watek->id }}">{{ $watek->tytul }}</option>
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
