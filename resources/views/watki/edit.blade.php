@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj wątek</h1>
        <form action="{{ route('watki.update', $watek->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tytul">Tytuł</label>
                <input type="text" name="tytul" class="form-control" value="{{ $watek->tytul }}" required>
            </div>
            <div class="form-group">
                <label for="kategoria_id">Kategoria</label>
                <select name="kategoria_id" class="form-control" required>
                    @foreach($kategorie_forum as $kategoria)
                        <option value="{{ $kategoria->id }}" @if($watek->kategoria_id == $kategoria->id) selected @endif>{{ $kategoria->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="uzytkownik_id">Użytkownik</label>
                <select name="uzytkownik_id" class="form-control" required>
                    @foreach($uzytkownicy as $uzytkownik)
                        <option value="{{ $uzytkownik->id }}" @if($watek->uzytkownik_id == $uzytkownik->id) selected @endif>{{ $uzytkownik->nazwa_uzytkownika }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn
