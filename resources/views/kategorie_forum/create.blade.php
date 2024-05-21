@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nową kategorię forum</h1>
        <form action="{{ route('kategorie_forum.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
