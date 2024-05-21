@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj kategorię forum</h1>
        <form action="{{ route('kategorie_forum.update', $kategoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" value="{{ $kategoria->nazwa }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
