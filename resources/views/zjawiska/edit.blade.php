@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj zjawisko</h1>
        <form action="{{ route('zjawiska.update', $zjawisko->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" value="{{ $zjawisko->nazwa }}" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" class="form-control">{{ $zjawisko->opis }}</textarea>
            </div>
            <div class="form-group">
                <label for="data_zjawiska">Data Zjawiska</label>
                <input type="date" name="data_zjawiska" class="form-control" value="{{ $zjawisko->data_zjawiska }}" required>
            </div>
            <div class="form-group">
                <label for="kategoria_id">Kategoria</label>
                <select name="kategoria_id" class="form-control" required>
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->id }}" @if($zjawisko->kategoria_id == $kategoria->id) selected @endif>{{ $kategoria->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
