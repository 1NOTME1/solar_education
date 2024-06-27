@extends('layouts.app')

@section('content')
<style>
    /* Domyślnie jasne kolory */
    .container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        color: #333;
        margin-top: 20px;
    }

    h1 {
        margin-bottom: 30px;
        color: #333;
    }

    .btn {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    table {
        width: 100%;
        margin-top: 20px;
        background-color: #fff; /* Domyślnie jasne tło tabeli */
    }

    th, td {
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: #ddd;
        color: #333;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .short-description {
        text-align: left;
        max-width: 200px; /* Maksymalna szerokość komórki z opisem */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; /* Skrócenie tekstu */
    }

    /* Dark mode styles */
    body.dark-mode .container {
        background-color: #282c34;
        color: #ffffff;
    }

    body.dark-mode h1 {
        color: #ffffff;
    }

    body.dark-mode .btn-primary {
        background-color: #1e90ff;
        color: #ffffff;
    }

    body.dark-mode .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    body.dark-mode .btn-danger {
        background-color: #ff4f5e;
        color: #ffffff;
    }

    body.dark-mode table {
        background-color: #333740;
        color: #ffffff;
    }

    body.dark-mode th {
        background-color: #454d55;
        color: #ffffff;
    }

    body.dark-mode tr:hover {
        background-color: #40454f;
    }
</style>

<div class="container">
    <h1>Planety</h1>
    <a href="{{ route('planety.create') }}" class="btn btn-primary mb-4">Dodaj nową planetę</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Typ</th>
                <th>Masa</th>
                <th>Odległość od Słońca</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planety as $planeta)
                @if($planeta->status)
                    <tr>
                        <td>{{ $planeta->id }}</td>
                        <td>{{ $planeta->nazwa }}</td>
                        <td>{{ $planeta->typ }}</td>
                        <td>{{ $planeta->masa }}</td>
                        <td>{{ $planeta->odleglosc_od_slonca }}</td>
                        <td class="short-description">{{ $planeta->opis }}</td>
                        <td>
                            <a href="{{ route('planety.edit', $planeta->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('planety.destroy', $planeta->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    });
</script>
@endsection
