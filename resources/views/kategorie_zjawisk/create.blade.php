@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nową kategorię zjawisk</h1>
        <form action="{{ route('kategorie_zjawisk.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
