<?php

namespace App\Http\Controllers;

use App\Models\KategoriaForum;
use App\Models\Watek;
use App\Models\Post;
use App\Models\Komentarz;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $kategorie = KategoriaForum::all();
        return view('forum.index', compact('kategorie'));
    }

    public function showKategoria($id)
    {
        $kategoria = KategoriaForum::findOrFail($id);
        $watki = $kategoria->watki;
        return view('forum.kategoria', compact('kategoria', 'watki'));
    }

    public function showWatek($id)
    {
        $watek = Watek::findOrFail($id);
        $posty = $watek->posty; // Pobierz posty związane z wątkiem
        if ($posty === null) {
            $posty = collect(); // Inicjalizuj jako pusta kolekcja, jeśli brak postów
        }
        return view('forum.watek', compact('watek', 'posty'));
    }

    public function storeWatek(Request $request, $kategoriaId)
    {
        $request->validate([
            'tytul' => 'required|string|max:255',
            'tresc' => 'required|string',
        ]);

        $watek = Watek::create([
            'tytul' => $request->tytul,
            'uzytkownik_id' => auth()->id(),
            'data_utworzenia' => now(),
            'kategoria_forum_id' => $kategoriaId,
        ]);

        Post::create([
            'tresc' => $request->tresc,
            'data_publikacji' => now(),
            'uzytkownik_id' => auth()->id(),
            'watek_id' => $watek->id,
        ]);

        return redirect()->route('forum.watek', $watek->id);
    }

    public function storePost(Request $request, $watekId)
    {
        $request->validate([
            'tresc' => 'required|string',
        ]);

        Post::create([
            'tresc' => $request->tresc,
            'data_publikacji' => now(),
            'uzytkownik_id' => auth()->id(),
            'watek_id' => $watekId,
        ]);

        return redirect()->route('forum.watek', $watekId);
    }

    public function storeKomentarz(Request $request, $postId)
    {
        $request->validate([
            'tresc' => 'required|string',
        ]);

        Komentarz::create([
            'tresc' => $request->tresc,
            'data_publikacji' => now(),
            'uzytkownik_id' => auth()->id(),
            'post_id' => $postId,
        ]);

        $post = Post::findOrFail($postId);
        return redirect()->route('forum.watek', $post->watek_id);
    }
}
