@extends('layouts.app')

@section('content')
<style>
    .container {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
        margin: 20px auto;
    }

    h1 {
        color: #333;
        font-size: 36px;
        margin-bottom: 25px;
        text-align: center;
    }

    .post-container {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fff;
    }

    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .post-header strong {
        font-size: 18px;
        color: #007bff;
    }

    .post-header .date {
        font-size: 14px;
        color: #999;
    }

    .post-content {
        margin-bottom: 10px;
        color: #333;
    }

    .comment-form, .new-post-form {
        margin-top: 15px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .comment-form label, .new-post-form label {
        font-weight: bold;
        color: #333;
    }

    .comment-form textarea, .new-post-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
    }

    .comment-form button, .new-post-form button, .delete-comment-button, .edit-comment-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .comment-form button:hover, .new-post-form button:hover, .delete-comment-button:hover, .edit-comment-button:hover {
        background-color: #0056b3;
    }

    .comment-container {
        margin-top: 10px;
        padding-left: 20px;
        border-left: 2px solid #ddd;
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 10px;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .comment-header strong {
        font-size: 16px;
        color: #007bff;
    }

    .comment-header .date {
        font-size: 14px;
        color: #999;
    }

    .comment-header .options {
        position: relative;
    }

    .comment-header .options .dropdown {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .comment-header .options:hover .dropdown {
        display: block;
    }

    .comment-header .options .dropdown button {
        display: block;
        width: 100%;
        padding: 10px;
        text-align: left;
        border: none;
        background: none;
        cursor: pointer;
        color: #333;
    }

    .comment-header .options .dropdown button:hover {
        background-color: #f1f1f1;
    }

    .no-comments {
        color: #999;
        font-style: italic;
    }

    .filter-container, .sort-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .filter-input, .sort-select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
        width: 40%;
        margin: 0 5px;
    }

    /* Dark mode styles */
    body.dark-mode .container {
        background-color: #1f1f1f;
        color: #e0e0e0;
    }

    body.dark-mode h1 {
        color: #e0e0e0;
    }

    body.dark-mode .post-container {
        background-color: #2b2b2b;
        border: 1px solid #333;
    }

    body.dark-mode .post-header strong {
        color: #1e90ff;
    }

    body.dark-mode .post-header .date {
        color: #999;
    }

    body.dark-mode .post-content {
        color: #ccc;
    }

    body.dark-mode .comment-form, body.dark-mode .new-post-form {
        background-color: #2b2b2b;
        border: 1px solid #333;
    }

    body.dark-mode .comment-form label, body.dark-mode .new-post-form label {
        color: #ccc;
    }

    body.dark-mode .comment-form textarea, body.dark-mode .new-post-form textarea {
        background-color: #1f1f1f;
        color: #ccc;
        border: 1px solid #444;
    }

    body.dark-mode .comment-form button, body.dark-mode .new-post-form button, .delete-comment-button, .edit-comment-button {
        background-color: #1e90ff;
    }

    body.dark-mode .comment-form button:hover, body.dark-mode .new-post-form button:hover, .delete-comment-button:hover, .edit-comment-button:hover {
        background-color: #1c86ee;
    }

    body.dark-mode .comment-container {
        background-color: #3a3a3a;
        border-left: 2px solid #444;
    }

    body.dark-mode .comment-header strong {
        color: #1e90ff;
    }

    body.dark-mode .comment-header .date {
        color: #999;
    }

    body.dark-mode .no-comments {
        color: #999;
    }
</style>

<div class="container">
    <h1 class="forum-header">{{ $watek->tytul }}</h1>
    <p>Stworzone przez: <strong>{{ $watek->uzytkownik->name }}</strong> w dniu {{ $watek->data_utworzenia }}</p>

    <div class="filter-container">
        <input type="date" id="filterDateFrom" class="filter-input" placeholder="Od daty...">
        <input type="date" id="filterDateTo" class="filter-input" placeholder="Do daty...">
    </div>
    <div class="sort-container">
        <select id="sortSelect" class="sort-select">
            <option value="newest">Sortuj od najnowszych</option>
            <option value="oldest">Sortuj od najstarszych</option>
            <option value="most_replied">Sortuj według liczby komentarzy</option>
        </select>
    </div>

    @if ($posty && $posty->isNotEmpty())
        <div id="postList">
            @foreach ($posty as $post)
                <div class="post-container" data-date="{{ $post->data_publikacji }}">
                    <div class="post-header">
                        <strong>{{ $post->uzytkownik->name }}</strong>
                        <span class="date">{{ $post->data_publikacji }}</span>
                    </div>
                    <div class="post-content">
                        <p>{{ $post->tresc }}</p>
                    </div>
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
                            <div class="comment-container">
                                <div class="comment-header">
                                    <div>
                                        <strong>{{ $komentarz->uzytkownik->name }}</strong>
                                        <span class="date">{{ $komentarz->data_publikacji }}</span>
                                        @if ($komentarz->data_edycji)
                                            <span>(edytowane)</span>
                                        @endif
                                    </div>
                                    @if ($komentarz->uzytkownik_id == Auth::id())
                                        <div class="options">
                                            <span>&#8226;&#8226;&#8226;</span>
                                            <div class="dropdown">
                                                <button onclick="editComment({{ $komentarz->id }})">Edytuj</button>
                                                <form method="POST" action="{{ route('forum.komentarz.delete', $komentarz->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-comment-button">Usuń</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <p id="comment-content-{{ $komentarz->id }}">{{ $komentarz->tresc }}</p>
                                <form method="POST" action="{{ route('forum.komentarz.edit', $komentarz->id) }}" class="edit-comment-form" id="edit-form-{{ $komentarz->id }}" style="display: none;">
                                    @csrf
                                    <div>
                                        <textarea id="edit-tresc-{{ $komentarz->id }}" name="tresc" required>{{ $komentarz->tresc }}</textarea>
                                    </div>
                                    <button type="submit">Zapisz</button>
                                    <button type="button" onclick="cancelEdit({{ $komentarz->id }})">Anuluj</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <p class="no-comments">Brak komentarzy dla tego posta.</p>
                    @endif
                </div>
            @endforeach
        </div>
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

<!-- Dodaj skrypt JavaScript bezpośrednio w pliku -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('dark-mode-toggle');
    if (toggleButton) {
        toggleButton.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
        });
    }

    document.getElementById('filterDateFrom').addEventListener('change', function() {
        filterPosts();
    });

    document.getElementById('filterDateTo').addEventListener('change', function() {
        filterPosts();
    });

    document.getElementById('sortSelect').addEventListener('change', function() {
        sortPosts();
    });

    function filterPosts() {
        let dateFrom = new Date(document.getElementById('filterDateFrom').value);
        let dateTo = new Date(document.getElementById('filterDateTo').value);
        let posts = document.querySelectorAll('.post-container');

        posts.forEach(post => {
            let postDate = new Date(post.getAttribute('data-date'));

            if ((!isNaN(dateFrom) && postDate < dateFrom) || (!isNaN(dateTo) && postDate > dateTo)) {
                post.style.display = 'none';
            } else {
                post.style.display = '';
            }
        });
    }

    function sortPosts() {
        let sortValue = document.getElementById('sortSelect').value;
        let postList = document.getElementById('postList');
        let posts = Array.from(postList.querySelectorAll('.post-container'));

        posts.sort((a, b) => {
            let dateA = new Date(a.getAttribute('data-date'));
            let dateB = new Date(b.getAttribute('data-date'));

            if (sortValue === 'newest') {
                return dateB - dateA;
            } else if (sortValue === 'oldest') {
                return dateA - dateB;
            } else if (sortValue === 'most_replied') {
                let commentsA = a.querySelectorAll('.comment-container').length;
                let commentsB = b.querySelectorAll('.comment-container').length;
                return commentsB - commentsA;
            }
        });

        while (postList.firstChild) {
            postList.removeChild(postList.firstChild);
        }

        posts.forEach(post => {
            postList.appendChild(post);
        });
    }
});

function editComment(id) {
    document.getElementById('comment-content-' + id).style.display = 'none';
    document.getElementById('edit-form-' + id).style.display = 'block';
}

function cancelEdit(id) {
    document.getElementById('comment-content-' + id).style.display = 'block';
    document.getElementById('edit-form-' + id).style.display = 'none';
}
</script>
@endsection
