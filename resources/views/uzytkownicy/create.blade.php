@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nowego użytkownika</h1>
        <form action="{{ route('uzytkownicy.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa_uzytkownika">Nazwa użytkownika</label>
                <input type="text" name="nazwa_uzytkownika" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="haslo">Hasło</label>
                <input type="password" name="haslo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rola_id">Rola</label>
                <select name="rola_id" class="form-control" required>
                    @foreach($role as $rola)
                        <option value="{{ $rola->id }}">{{ $rola->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
