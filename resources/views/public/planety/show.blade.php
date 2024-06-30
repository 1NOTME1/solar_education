@extends('layouts.app')

@section('content')
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

    <style>
        .container {
            background-color: #e9ecef;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            margin: 0 auto;
        }

        h1 {
            color: #212529;
            font-size: 36px;
            margin-bottom: 25px;
            text-align: center;
        }

        .article-content {
            font-size: 18px;
            line-height: 1.8;
            color: #495057;
        }

        .article-content p {
            margin-bottom: 20px;
        }

        .article-content h2 {
            color: #343a40;
            font-size: 28px;
            margin-top: 35px;
            margin-bottom: 15px;
        }

        .article-content .attribute {
            font-weight: bold;
        }

        .article-content .value {
            margin-left: 10px;
            color: #007bff;
        }

        .article-content .section {
            margin-bottom: 25px;
        }

        .article-content p {
            background-color: #f8f9fa;
            padding: 10px;
            border-left: 5px solid #007bff;
            margin-bottom: 20px;
            font-size: 18px;
            color: #495057;
            line-height: 1.8;
            border-radius: 5px;
        }

        body.dark-mode .container {
            background-color: #1f1f1f;
            color: #e0e0e0;
        }

        body.dark-mode h1 {
            color: #e0e0e0;
        }

        body.dark-mode .article-content h2 {
            color: #ccc;
        }

        body.dark-mode .article-content p {
            background-color: #2b2b2b;
            border-left: 5px solid #1e90ff;
            color: #ccc;
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
