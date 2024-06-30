@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Księżyce</h1>
    <a href="{{ route('ksiezyce.create') }}" class="btn btn-primary mb-4">Dodaj nowy księżyc</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Typ</th>
                <th>Masa</th>
                <th>Odległość od planety</th>
                <th>Planeta</th>
                <th>Opis</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ksiezyce as $ksiezyc)
                @if($ksiezyc->status)
                    <tr>
                        <td>{{ $ksiezyc->id }}</td>
                        <td>{{ $ksiezyc->nazwa }}</td>
                        <td>{{ $ksiezyc->typ }}</td>
                        <td>{{ $ksiezyc->masa }}</td>
                        <td>{{ $ksiezyc->odleglosc_od_planety }}</td>
                        <td>{{ $ksiezyc->planeta->nazwa }}</td>
                        <td class="short-description">{{ $ksiezyc->opis }}</td>
                        <td>{{ $ksiezyc->status == 1 ? 'Aktywna' : 'Nieaktywna' }}</td>
                        <td>
                            <a href="{{ route('ksiezyce.edit', $ksiezyc->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('ksiezyce.destroy', $ksiezyc->id) }}" method="POST" style="display:inline-block;">
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

<style>
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
        background-color: #fff;
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
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    });
</script>
@endsection
