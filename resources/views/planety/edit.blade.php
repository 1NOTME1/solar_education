@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-white">Edytuj planetę</h1>
        <form action="{{ route('planety.update', $planeta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nazwa" class="text-white">Nazwa</label>
                <input type="text" name="nazwa" class="form-control bg-dark text-white border-secondary" value="{{ $planeta->nazwa }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="typ" class="text-white">Typ</label>
                <input type="text" name="typ" class="form-control bg-dark text-white border-secondary" value="{{ $planeta->typ }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="masa" class="text-white">Masa</label>
                <input type="number" name="masa" class="form-control bg-dark text-white border-secondary" value="{{ $planeta->masa }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="odleglosc_od_slonca" class="text-white">Odległość od Słońca</label>
                <input type="number" name="odleglosc_od_slonca" class="form-control bg-dark text-white border-secondary" value="{{ $planeta->odleglosc_od_slonca }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="opis" class="text-white">Opis</label>
                <textarea name="opis" class="form-control bg-dark text-white border-secondary">{{ $planeta->opis }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
