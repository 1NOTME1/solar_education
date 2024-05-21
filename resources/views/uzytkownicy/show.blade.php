@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły użytkownika</h1>
        <div class="form-group">
            <label for="nazwa_uzytkownika">Nazwa użytkownika</label>
            <p>{{ $uzytkownik->nazwa_uzytkownika }}</p>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <p>{{ $uzytkownik->email }}</p>
        </div>
        <div class="form-group">
            <label for="rola_id">Rola</label>
            <p>{{ $uzytkownik->rola->nazwa }}</p>
        </div>
        <a href="{{ route('uzytkownicy.index') }}" class="btn btn-primary">Powrót</a>
    </div>
@endsection
