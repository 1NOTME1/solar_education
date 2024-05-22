@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-white">Dodaj nową planetę</h1>
        <form action="{{ route('planety.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa" class="text-white">Nazwa</label>
                <input type="text" name="nazwa" class="form-control bg-dark text-white" required>
            </div>
            <div class="form-group">
                <label for="typ" class="text-white">Typ</label>
                <input type="text" name="typ" class="form-control bg-dark text-white" required>
            </div>
            <div class="form-group">
                <label for="masa" class="text-white">Masa</label>
                <input type="number" name="masa" class="form-control bg-dark text-white" required>
            </div>
            <div class="form-group">
                <label for="odleglosc_od_slonca" class="text-white">Odległość od Słońca</label>
                <input type="number" name="odleglosc_od_slonca" class="form-control bg-dark text-white" required>
            </div>
            <div class="form-group">
                <label for="opis" class="text-white">Opis</label>
                <textarea name="opis" class="form-control bg-dark text-white"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
