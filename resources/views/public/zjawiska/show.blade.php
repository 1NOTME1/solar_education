@extends('layouts.app')

@section('content')
<style>
/* Stylizacja dla szczegółów zjawiska */
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

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #343a40;
    color: #fff;
}

.table td {
    background-color: #fff;
}

.table tr:nth-child(even) td {
    background-color: #f2f2f2;
}

.table tr:hover td {
    background-color: #e9ecef;
}
</style>

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
@endsection
