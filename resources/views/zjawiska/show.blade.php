@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły zjawiska</h1>
        <div class="form-group">
            <label for="nazwa">Nazwa</label>
            <p>{{ $zjawisko->nazwa }}</p>
        </div>
        <div class="form-group">
            <label for="opis">Opis</label>
            <p>{{ $zjawisko->opis }}</p>
        </div>
        <div class="form-group">
            <label for="data_zjawiska">Data Zjawiska</label>
            <p>{{ $zjawisko->data_zjawiska }}</p>
        </div>
        <div class="form-group">
            <label for="kategoria_id">Kategoria</label>
            <p>{{ $zjawisko->kategoria->nazwa }}</p>
        </div>
        <a href="{{ route('zjawiska.index') }}" class="btn btn-primary">Powrót</a>
    </div>
@endsection
