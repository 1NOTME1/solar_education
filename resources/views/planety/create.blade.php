@extends('layouts.app')

@section('content')
<style>
    .container {
        background-color: #343a40; /* Ciemniejsze tło dla kontenera */
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        color: #f8f9fa;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    h1.text-white {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label.text-white {
        display: block;
        margin-bottom: 10px;
    }

    .form-control {
        background-color: #23272b; /* Ciemne tło dla pól formularza */
        border: 1px solid #495057; /* Granica pól */
        color: #ffffff; /* Kolor tekstu */
        border-radius: 5px; /* Zaokrąglenie granic */
        padding: 10px;
    }

    .form-control:focus {
        background-color: #2c3035; /* Ciemniejsze tło przy fokusu */
        border-color: #007bff; /* Niebieska granica przy fokusu */
        outline: none; /* Usunięcie domyślnego zarysu */
        color: #ffffff;
    }

    .btn-primary {
        background-color: #007bff; /* Niebieskie tło dla przycisku */
        border: none; /* Brak granic */
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        width: 100%; /* Pełna szerokość przycisku */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Ciemniejszy niebieski na hover */
    }
</style>

<div class="container">
    <h1 class="text-white">Dodaj nową planetę</h1>
    <form action="{{ route('planety.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nazwa" class="text-white">Nazwa</label>
            <input type="text" name="nazwa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="typ" class="text-white">Typ</label>
            <input type="text" name="typ" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="masa" class="text-white">Masa</label>
            <input type="number" name="masa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="odleglosc_od_slonca" class="text-white">Odległość od Słońca</label>
            <input type="number" name="odleglosc_od_slonca" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="opis" class="text-white">Opis</label>
            <textarea name="opis" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>
@endsection
