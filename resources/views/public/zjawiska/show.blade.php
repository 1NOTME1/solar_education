@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły zjawiska: {{ $zjawisko->nazwa }}</h1>
        <table class="table">
            <tr>
                <th>Nazwa</th>
                <td>{{ $zjawisko->nazwa }}</td>
            </tr>
            <tr>
                <th>Kategoria</th>
                <td>{{ $kategoria->nazwa }}</td>
            </tr>
            <tr>
                <th>Opis</th>
                <td>{{ $zjawisko->opis }}</td>
            </tr>
            <tr>
                <th>Data zjawiska</th>
                <td>{{ $zjawisko->data_zjawiska }}</td>
            </tr>
        </table>
    </div>

    <style>
        .container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
            margin: auto;
        }

        h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 25px;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
            font-size: 20px;
        }

        .table td {
            background-color: #fff;
            color: #555;
            font-size: 18px;
        }

        .table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        .table tr:hover td {
            background-color: #e9ecef;
        }

        body.dark-mode .container {
            background-color: #1f1f1f;
            color: #e0e0e0;
        }

        body.dark-mode h1 {
            color: #e0e0e0;
        }

        body.dark-mode .table th {
            background-color: #343a40;
            color: #fff;
        }

        body.dark-mode .table td {
            background-color: #2b2b2b;
            color: #ccc;
        }

        body.dark-mode .table tr:nth-child(even) td {
            background-color: #1f1f1f;
        }

        body.dark-mode .table tr:hover td {
            background-color: #3a3a3a;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('dark-mode-toggle');
            if (toggleButton) {
                toggleButton.addEventListener('click', function() {
                    document.body.classList.toggle('dark-mode');
                });
            }
        });
    </script>
@endsection
