@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nowe zjawisko</h1>
        <form action="{{ route('zjawiska.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="data_zjawiska">Data Zjawiska</label>
                <input type="date" name="data_zjawiska" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kategoria_id">Kategoria</label>
                <select name="kategoria_id" class="form-control" required>
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
