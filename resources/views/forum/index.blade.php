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

    .list-group {
        list-style-type: none;
        padding: 0;
    }

    .list-group-item {
        background-color: #fff;
        margin: 10px 0;
        padding: 15px 20px;
        border: 2px solid #ddd;
        border-radius: 6px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #007bff;
        text-decoration: none;
        font-size: 20px;
        font-weight: 500;
    }

    .list-group-item:hover {
        background-color: #e9ecef;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-decoration: underline;
        color: #0056b3;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .button-container a {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 500;
    }

    .button-container a:hover {
        background-color: #0056b3;
    }

    .search-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .search-input {
        padding: 10px;
        width: 70%;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .search-input:focus {
        outline: none;
        border-color: #007bff;
    }

    .sort-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .sort-select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    /* Dark mode styles */
    body.dark-mode .container {
        background-color: #1f1f1f;
        color: #e0e0e0;
    }

    body.dark-mode h1 {
        color: #e0e0e0;
    }

    body.dark-mode .list-group-item {
        background-color: #2b2b2b;
        color: #1e90ff;
        border: 2px solid #444;
    }

    body.dark-mode .list-group-item:hover {
        background-color: #3a3a3a;
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        color: #1c86ee;
    }

    body.dark-mode .button-container a {
        background-color: #1e90ff;
    }

    body.dark-mode .button-container a:hover {
        background-color: #1c86ee;
    }

    body.dark-mode .search-input {
        background-color: #1f1f1f;
        color: #ccc;
        border: 1px solid #444;
    }

    body.dark-mode .search-input:focus {
        border-color: #007bff;
    }

    body.dark-mode .sort-select {
        background-color: #1f1f1f;
        color: #ccc;
        border: 1px solid #444;
    }
</style>

<div class="container">
    <h1 class="forum-header">Forum</h1>
    <div class="button-container">
        <a href="{{ route('kategorie_forum.create') }}">Dodaj nową kategorię</a>
    </div>
    <div class="search-container">
        <input type="text" id="searchInput" class="search-input" placeholder="Szukaj kategorii...">
    </div>
    <div class="sort-container">
        <select id="sortSelect" class="sort-select">
            <option value="alphabetical">Sortuj alfabetycznie</option>
            <option value="threads">Sortuj według liczby wątków</option>
        </select>
    </div>
    <div class="list-group" id="categoryList">
        @foreach ($kategorie_forum as $kategoria)
            <a href="{{ route('forum.kategoria', $kategoria->id) }}" class="list-group-item list-group-item-action forum-category">
                <span>{{ $kategoria->nazwa }}</span>
                <span>{{ $kategoria->watki_count }} wątków</span>
            </a>
        @endforeach
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let categoryList = document.getElementById('categoryList');
        let categories = categoryList.getElementsByClassName('list-group-item');

        for (let i = 0; i < categories.length; i++) {
            let category = categories[i];
            let text = category.textContent || category.innerText;
            if (text.toLowerCase().indexOf(filter) > -1) {
                category.style.display = '';
            } else {
                category.style.display = 'none';
            }
        }
    });

    document.getElementById('sortSelect').addEventListener('change', function() {
        let sortValue = this.value;
        let categoryList = document.getElementById('categoryList');
        let categories = Array.from(categoryList.getElementsByClassName('list-group-item'));

        categories.sort(function(a, b) {
            if (sortValue === 'alphabetical') {
                return a.textContent.localeCompare(b.textContent);
            } else if (sortValue === 'threads') {
                let countA = parseInt(a.querySelector('span:last-child').textContent.split(' ')[0]);
                let countB = parseInt(b.querySelector('span:last-child').textContent.split(' ')[0]);
                return countB - countA;
            }
        });

        while (categoryList.firstChild) {
            categoryList.removeChild(categoryList.firstChild);
        }

        categories.forEach(function(category) {
            categoryList.appendChild(category);
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('dark-mode-toggle');
        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                document.body.classList.toggle('dark-mode');
            });
        }
    });
</script>
@endsection
