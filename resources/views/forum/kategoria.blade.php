@extends('layouts.app')

@section('content')
<style>
    .forum-header {
        margin-top: 20px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .forum-category {
        margin-bottom: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s ease;
    }

    .forum-category:hover {
        background-color: #f5f5f5;
        color: #000;
    }

    .forum-form {
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .forum-form label {
        font-weight: bold;
    }

    .forum-form input[type="text"], .forum-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .forum-form button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .forum-form button:hover {
        background-color: #0056b3;
    }

    .forum-threads {
        margin-top: 20px;
    }

    .forum-threads a {
        text-decoration: none;
        color: #007bff;
        display: block;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .forum-threads a:hover {
        background-color: #f5f5f5;
        color: #0056b3;
    }
</style>

<div class="container">
    <h1 class="forum-header">{{ $kategoria->nazwa }}</h1>
    <form method="POST" action="{{ route('forum.watek.store', $kategoria->id) }}" class="forum-form">
        @csrf
        <div>
            <label for="tytul">Tytuł</label>
            <input type="text" id="tytul" name="tytul" required>
        </div>
        <div>
            <label for="tresc">Treść</label>
            <textarea id="tresc" name="tresc" required></textarea>
        </div>
        <button type="submit">Utwórz wątek</button>
    </form>
    <h2>Wątki</h2>
    <div class="forum-threads">
        @foreach ($watki as $watek)
            <a href="{{ route('forum.watek', $watek->id) }}">{{ $watek->tytul }}</a>
        @endforeach
    </div>
</div>
@endsection
