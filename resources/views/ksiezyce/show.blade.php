@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły księżyca</h1>
        <div class="form-group">
            <label for="nazwa">Nazwa</label>
            <p>{{ $ksiezyc->nazwa }}</p>
        </div>
        <div class="form-group">
            <label for="planeta_id">Planeta</label>
            <p>{{ $ksiezyc->planeta->nazwa }}</p>
        </div>
        <div class="form-group">
            <label for="opis">Opis</label>
            <p>{{ $ksiezyc->opis }}</p>
        </div>
        <a href="{{ route('ksiezyce.index') }}" class="btn btn-primary">Powrót</a>
    </div>
@endsection
