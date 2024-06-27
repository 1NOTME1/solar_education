@extends('layouts.app')

@section('content')
<style>
/* Stylizacja dla szczegółów księżyca */
.container {
    background-color: #f8f9fa;
    padding: 30px; /* zwiększony padding kontenera */
    border-radius: 12px; /* zaokrąglone rogi dla lepszego efektu wizualnego */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16); /* subtelny cień dla dodania głębi */
    margin: auto; /* auto dla centrowania */
}

h1 {
    color: #333;
    font-size: 36px; /* powiększona czcionka dla nagłówka */
    margin-bottom: 25px; /* zwiększony margines dolny */
    text-align: center;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 25px; /* zwiększony margines dolny */
}

.table th, .table td {
    padding: 15px; /* zwiększony padding dla komórek */
    text-align: left;
    border-bottom: 2px solid #ddd; /* grubsza linia oddzielająca */
}

.table th {
    background-color: #343a40;
    color: #fff;
    font-size: 20px; /* powiększona czcionka dla nagłówków */
}

.table td {
    background-color: #fff;
    color: #555; /* ciemniejszy kolor tekstu dla lepszej czytelności */
    font-size: 18px; /* powiększona czcionka dla danych */
}

.table tr:nth-child(even) td {
    background-color: #f2f2f2;
}

.table tr:hover td {
    background-color: #e9ecef;
}

/* Dark mode styles */
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
