@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły księżyca</h1>
        <div class="form-group">
            <label for="nazwa">Nazwa</label>
            <p>{{ $ksiezyc->nazwa }}</p>
        </div>
        <div class="form-group">
            <label for="typ">Typ</label>
            <p>{{ $ksiezyc->typ }}</p>
        </div>
        <div class="form-group">
            <label for="masa">Masa</label>
            <p>{{ $ksiezyc->masa }}</p>
        </div>
        <div class="form-group">
            <label for="odleglosc_od_planety">Odległość od planety</label>
            <p>{{ $ksiezyc->odleglosc_od_planety }}</p>
        </div>
        <div class="form-group">
            <label for="opis">Opis</label>
            <p>{{ $ksiezyc->opis }}</p>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <p>{{ $ksiezyc->status == 1 ? 'Aktywna' : 'Nieaktywna' }}</p>
        </div>
        <div class="form-group">
            <label for="planeta_id">Planeta</label>
            <p>{{ $ksiezyc->planeta->nazwa }}</p>
        </div>
        <a href="{{ route('ksiezyce.index') }}" class="btn btn-primary">Powrót</a>
    </div>
@endsection
