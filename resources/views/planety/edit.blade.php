@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj planetę</h1>
        <form action="{{ route('planety.update', $planeta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" value="{{ $planeta->nazwa }}" required>
            </div>
            <div class="form-group">
                <label for="typ">Typ</label>
                <input type="text" name="typ" class="form-control" value="{{ $planeta->typ }}" required>
            </div>
            <div class="form-group">
                <label for="masa">Masa</label>
                <input type="number" name="masa" class="form-control" value="{{ $planeta->masa }}" required>
            </div>
            <div class="form-group">
                <label for="odleglosc_od_slonca">Odległość od Słońca</label>
                <input type="number" name="odleglosc_od_slonca" class="form-control" value="{{ $planeta->odleglosc_od_slonca }}" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" class="form-control">{{ $planeta->opis }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
