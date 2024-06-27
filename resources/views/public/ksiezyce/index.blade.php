@extends('layouts.app')

@section('content')
<style>
    .container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: 20px auto;
    }

    h1 {
        color: #212529;
        font-size: 36px;
        margin-bottom: 25px;
        text-align: center;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        background-color: #fff;
        margin: 15px 0;
        padding: 15px 20px;
        border: 2px solid #dee2e6;
        border-radius: 6px;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    li:hover {
        background-color: #e2e6ea;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    a {
        color: #007bff;
        text-decoration: none;
        font-size: 20px;
        display: block;
        font-weight: 500; /* Dodano dla lepszego wyróżnienia tekstu */
    }

    a:hover {
        text-decoration: underline;
        color: #0056b3; /* Ciemniejszy kolor dla lepszego kontrastu podczas hover */
    }

    .search-box {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }

    .search-input {
        padding: 10px;
        width: 70%;
        border-radius: 5px;
        border: 1px solid #dee2e6;
    }

    .search-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }

    .search-button:hover {
        background-color: #0056b3;
    }

    /* Dark mode styles */
    body.dark-mode .container {
        background-color: #1f1f1f;
        color: #e0e0e0;
    }

    body.dark-mode h1 {
        color: #e0e0e0;
    }

    body.dark-mode li {
        background-color: #2b2b2b;
        color: #1e90ff;
        border: 2px solid #444;
    }

    body.dark-mode li:hover {
        background-color: #3a3a3a;
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        color: #1c86ee;
    }

    body.dark-mode .search-input {
        background-color: #1f1f1f;
        color: #ccc;
        border: 1px solid #444;
    }

    body.dark-mode .search-input:focus {
        border-color: #007bff;
    }
</style>

<div class="container">
    <h1>Lista księżyców</h1>
    <div class="search-box">
        <input type="text" placeholder="Szukaj księżyca..." class="search-input">
        <button class="search-button">Szukaj</button>
    </div>
    <ul>
        @foreach ($ksiezyce as $ksiezyc)
            <li>
                <a href="{{ route('publicksiezyce.show', $ksiezyc->id) }}">{{ $ksiezyc->nazwa }}</a>
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Funkcja do filtrowania elementów
        document.querySelector('.search-input').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let listItems = document.querySelectorAll('ul li');
            listItems.forEach(function(item) {
                let text = item.textContent || item.innerText;
                item.style.display = text.toLowerCase().includes(filter) ? '' : 'none';
            });
        });

        // Skrypt do przełączania trybu dark mode
        const toggleButton = document.getElementById('dark-mode-toggle');
        if (toggleButton) {
            toggleButton.addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');
            });
        }
    });
</script>
@endsection
