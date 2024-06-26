@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj księżyc</h1>
        <form action="{{ route('ksiezyce.update', $ksiezyc->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" value="{{ $ksiezyc->nazwa }}" required>
            </div>
            <div class="form-group">
                <label for="planeta_id">Planeta</label>
                <select name="planeta_id" class="form-control" required>
                    @foreach($planety as $planeta)
                        <option value="{{ $planeta->id }}" @if($ksiezyc->planeta_id == $planeta->id) selected @endif>{{ $planeta->nazwa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="typ">Typ</label>
                <input type="text" name="typ" class="form-control" value="{{ $ksiezyc->typ }}" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" class="form-control">{{ $ksiezyc->opis }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
