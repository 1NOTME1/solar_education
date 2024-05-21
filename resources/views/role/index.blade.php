@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role</h1>
        <a href="{{ route('role.create') }}" class="btn btn-primary">Dodaj nową rolę</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($role as $rola)
                    <tr>
                        <td>{{ $rola->id }}</td>
                        <td>{{ $rola->nazwa }}</td>
                        <td>
                            <a href="{{ route('role.edit', $rola->id) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('role.destroy', $rola->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
