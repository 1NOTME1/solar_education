@extends('layouts.app')

@section('content')
<style>
/* Stylizacja dla listy planet */
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
    <h1>Lista planet</h1>
    <ul>
        @foreach ($planety as $planeta)
            <li>
                <a href="{{ route('publicplanety.show', $planeta->id) }}">{{ $planeta->nazwa }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
