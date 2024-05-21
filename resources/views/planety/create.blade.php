@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nową planetę</h1>
        <form action="{{ route('planety.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="typ">Typ</label>
                <input type="text" name="typ" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="masa">Masa</label>
                <input type="number" name="masa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="odleglosc_od_slonca">Odległość od Słońca</label>
                <input type="number" name="odleglosc_od_slonca" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
