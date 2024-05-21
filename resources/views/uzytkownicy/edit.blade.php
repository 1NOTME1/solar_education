@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj użytkownika</h1>
        <form action="{{ route('uzytkownicy.update', $uzytkownik->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa_uzytkownika">Nazwa użytkownika</label>
                <input type="text" name="nazwa_uzytkownika" class="form-control" value="{{ $uzytkownik->nazwa_uzytkownika }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $uzytkownik->email }}" required>
            </div>
            <div class="form-group">
                <label for="haslo">Hasło</label>
                <input type="password" name="haslo" class="form-control">
            </div>
            <div class="form-group">
                <label for="rola_id">Rola</label>
                <select name="rola_id" class="form-control" required>
                    @foreach($role as $rola)
                        <option value="{{ $rola->id }}" @if($uzytkownik->rola_id == $rola->id) selected @endif>{{ $rola->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
