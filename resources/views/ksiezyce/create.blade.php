@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nowy księżyc</h1>
        <form action="{{ route('ksiezyce.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="planeta_id">Planeta</label>
                <select name="planeta_id" class="form-control" required>
                    @foreach($planety jako $planeta)
                        <option value="{{ $planeta->id }}">{{ $planeta->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
