@extends('layouts.app')

@section('content')
    <style>
        /* Stylizacja dla szczegółów planety */
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

        .article-content {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }

        .article-content p {
            margin-bottom: 20px;
        }

        .article-content h2 {
            color: #343a40;
            font-size: 24px;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .article-content .attribute {
            font-weight: bold;
        }

        .article-content .value {
            margin-left: 10px;
        }

        .article-content .section {
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <h1>Szczegóły planety: {{ $planeta->nazwa }}</h1>
        <div class="article-content">
            <p>
                Planeta {{ $planeta->nazwa }} jest jednym z fascynujących obiektów w naszym układzie słonecznym. Poniżej
                przedstawiamy szczegółowe informacje dotyczące tej planety.
            </p>

            <div class="section">
                <h2>Podstawowe informacje</h2>
                <p>
                    <span class="attribute">Nazwa:</span><span class="value">{{ $planeta->nazwa }}</span>
                </p>
                <p>
                    <span class="attribute">Typ:</span><span class="value">{{ $planeta->typ }}</span>
                </p>
                <p>
                    <span class="attribute">Masa:</span><span class="value">{{ $planeta->masa }} kg</span>
                </p>
                <p>
                    <span class="attribute">Odległość od Słońca:</span><span
                        class="value">{{ $planeta->odleglosc_od_slonca }} km</span>
                </p>
            </div>

            <div class="section">
                <h2>Opis</h2>
                <p>{{ $planeta->opis }}</p>
            </div>
        </div>
    </div>
@endsection
