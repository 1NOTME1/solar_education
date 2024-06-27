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

    .form-control {
        background-color: #fff;
        color: #333;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    /* Dark mode styles */
    body.dark-mode .container {
        background-color: #282c34;
        color: #ffffff;
    }

    body.dark-mode h1 {
        color: #ffffff;
    }

    body.dark-mode .form-control {
        background-color: #333740;
        color: #ffffff;
        border: 1px solid #555;
    }

    body.dark-mode .btn-primary {
        background-color: #1e90ff;
        color: #ffffff;
    }
</style>

<div class="container">
    <h1 class="text-center display-4">Edytuj księżyc</h1>
    <form action="{{ route('ksiezyce.update', $ksiezyc->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" class="form-control" value="{{ $ksiezyc->nazwa }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="planeta_id">Planeta</label>
            <select name="planeta_id" class="form-control" required>
                @foreach($planety as $planeta)
                    <option value="{{ $planeta->id }}" @if($ksiezyc->planeta_id == $planeta->id) selected @endif>{{ $planeta->nazwa }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="typ">Typ</label>
            <input type="text" name="typ" class="form-control" value="{{ $ksiezyc->typ }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="opis">Opis</label>
            <textarea name="opis" class="form-control">{{ $ksiezyc->opis }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj</button>
    </form>
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
