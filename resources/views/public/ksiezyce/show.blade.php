@extends('layouts.app')

@section('content')
<style>
/* Stylizacja dla szczegółów księżyca */
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
    <h1>Szczegóły księżyca: {{ $ksiezyc->nazwa }}</h1>
    <table class="table">
        <tr>
            <th>Nazwa</th>
            <td>{{ $ksiezyc->nazwa }}</td>
        </tr>
        <tr>
            <th>Typ</th>
            <td>{{ $ksiezyc->typ }}</td>
        </tr>
        <tr>
            <th>Masa</th>
            <td>{{ $ksiezyc->masa }} kg</td>
        </tr>
        <tr>
            <th>Odległość od planety</th>
            <td>{{ $ksiezyc->odleglosc_od_planety }} km</td>
        </tr>
        <tr>
            <th>Opis</th>
            <td>{{ $ksiezyc->opis }}</td>
        </tr>
        <tr>
            <th>Planeta</th>
            <td>{{ $planeta->nazwa }}</td>
        </tr>
    </table>
</div>
@endsection
