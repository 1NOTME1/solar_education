@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-white">Księżyce</h1>
        <a href="{{ route('ksiezyce.create') }}" class="btn btn-primary mb-4">Dodaj nowy księżyc</a>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Planeta</th>
                    <th>Opis</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ksiezyce as $ksiezyc)
                    @if($ksiezyc->status)
                        <tr>
                            <td>{{ $ksiezyc->id }}</td>
                            <td>{{ $ksiezyc->nazwa }}</td>
                            <td>{{ $ksiezyc->planeta->nazwa }}</td>
                            <td>{{ $ksiezyc->opis }}</td>
                            <td>
                                <a href="{{ route('ksiezyce.edit', $ksiezyc->id) }}" class="btn btn-warning">Edytuj</a>
                                <form action="{{ route('ksiezyce.destroy', $ksiezyc->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
