@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj rolę</h1>
        <form action="{{ route('role.update', $rola->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" name="nazwa" class="form-control" value="{{ $rola->nazwa }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
@endsection
