@extends('layouts.app')

@section('content')
<style>
    .forum-header {
        margin-top: 20px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .post-container {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .post-container strong {
        display: block;
        margin-bottom: 10px;
    }

    .comment-form {
        margin-top: 15px;
    }

    .comment-form label {
        font-weight: bold;
    }

    .comment-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .comment-form button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .comment-form button:hover {
        background-color: #0056b3;
    }

    .new-post-form {
        margin-top: 30px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .new-post-form label {
        font-weight: bold;
    }

    .new-post-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .new-post-form button {
        background-color: #28a745;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .new-post-form button:hover {
        background-color: #218838;
    }
</style>

<div class="container">
    <h1 class="forum-header">{{ $watek->tytul }}</h1>
    <p>Stworzone przez: <strong>{{ $watek->uzytkownik->name }}</strong> w dniu {{ $watek->data_utworzenia }}</p>

    @if ($posty && $posty->isNotEmpty())
        @foreach ($posty as $post)
            <div class="post-container">
                <strong>{{ $post->uzytkownik->name }}</strong>
                <p>{{ $post->tresc }}</p>
                <form method="POST" action="{{ route('forum.komentarz.store', $post->id) }}" class="comment-form">
                    @csrf
                    <div>
                        <label for="tresc">Komentarz</label>
                        <textarea id="tresc" name="tresc" required></textarea>
                    </div>
                    <button type="submit">Dodaj komentarz</button>
                </form>
                @if ($post->komentarze && $post->komentarze->isNotEmpty())
                    @foreach ($post->komentarze as $komentarz)
                        <div>
                            <strong>{{ $komentarz->uzytkownik->name }}</strong>
                            <p>{{ $komentarz->tresc }}</p>
                        </div>
                    @endforeach
                @else
                    <p>Brak komentarzy dla tego posta.</p>
                @endif
            </div>
        @endforeach
    @else
        <p>Brak postów w tym wątku.</p>
    @endif

    <form method="POST" action="{{ route('forum.post.store', $watek->id) }}" class="new-post-form">
        @csrf
        <div>
            <label for="tresc">Treść</label>
            <textarea id="tresc" name="tresc" required></textarea>
        </div>
        <button type="submit">Dodaj post</button>
    </form>
</div>
@endsection
