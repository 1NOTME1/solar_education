@extends('layouts.app')

@section('content')
<style>
    /* Stylizacja dla listy zjawisk */
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        font-size: 32px;
        margin-bottom: 20px;
        text-align: center;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        background-color: #fff;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    li:hover {
        background-color: #e9ecef;
    }

    a {
        color: #007bff;
        text-decoration: none;
        font-size: 18px;
        display: block;
    }

    a:hover {
        text-decoration: underline;
    }

    </style>

<div class="container">
    <h1 class="forum-header">Forum</h1>
    <div class="list-group">
        @foreach ($kategorie as $kategoria)
            <a href="{{ route('forum.kategoria', $kategoria->id) }}" class="list-group-item list-group-item-action forum-category">
                {{ $kategoria->nazwa }}
            </a>
        @endforeach
    </div>
</div>
@endsection
