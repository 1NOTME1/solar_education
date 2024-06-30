@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj nową kategorię forum</h1>
    <form action="{{ route('kategorie_forum.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        max-width: 600px;
    }

    h1 {
        margin-bottom: 30px;
        color: #333;
        text-align: center;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    h1 {
        font-size: 42px;
    }
</style>
@endsection
