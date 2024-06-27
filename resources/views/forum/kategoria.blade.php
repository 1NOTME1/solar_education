@extends('layouts.app')

@section('content')
<style>
    .container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        margin: 20px auto;
    }

    h1 {
        color: #333;
        font-size: 36px;
        margin-bottom: 25px;
        text-align: center;
    }

    .forum-form {
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .forum-form label {
        font-weight: bold;
        color: #333;
    }

    .forum-form input[type="text"], .forum-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
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
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
        background-color: #fff;
    }

    .forum-threads a:hover {
        background-color: #e9ecef;
        color: #0056b3;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a, .pagination span {
        color: #007bff;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px 15px;
        margin: 0 5px;
        border-radius: 5px;
        text-decoration: none;
    }

    .pagination a:hover {
        background-color: #e9ecef;
    }

    .pagination .active span {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    /* Dark mode styles */
    body.dark-mode .container {
        background-color: #1f1f1f;
        color: #e0e0e0;
    }

    body.dark-mode h1 {
        color: #e0e0e0;
    }

    body.dark-mode .forum-form {
        background-color: #2b2b2b;
        border: 1px solid #444;
    }

    body.dark-mode .forum-form label {
        color: #ccc;
    }

    body.dark-mode .forum-form input[type="text"], body.dark-mode .forum-form textarea {
        background-color: #1f1f1f;
        color: #ccc;
        border: 1px solid #444;
    }

    body.dark-mode .forum-form button {
        background-color: #1e90ff;
    }

    body.dark-mode .forum-form button:hover {
        background-color: #1c86ee;
    }

    body.dark-mode .forum-threads a {
        background-color: #2b2b2b;
        color: #1e90ff;
        border: 1px solid #444;
    }

    body.dark-mode .forum-threads a:hover {
        background-color: #3a3a3a;
        color: #1c86ee;
    }

    body.dark-mode .pagination a, body.dark-mode .pagination span {
        background-color: #1f1f1f;
        color: #ccc;
        border: 1px solid #444;
    }

    body.dark-mode .pagination a:hover {
        background-color: #3a3a3a;
    }

    body.dark-mode .pagination .active span {
        background-color: #1e90ff;
        color: #fff;
        border: none;
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
            <a href="{{ route('forum.watek', $watek->id) }}">{{ $watek->tytul }} ({{ $watek->posty_count }} postów)</a>
        @endforeach
    </div>
    <div class="pagination">
        {{ $watki->links() }}
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
        });
    });
</script>
