<?php

namespace App\Http\Controllers;

use App\Models\KategoriaForum;
use App\Models\Watek;
use App\Models\Komentarz;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $kategorie_forum = KategoriaForum::withCount('watki')->get();
        return view('forum.index', compact('kategorie_forum'));
    }

    public function showKategoria($id, Request $request)
    {
        $kategoria = KategoriaForum::findOrFail($id);

        $query = $kategoria->watki()->withCount('posty');

        if ($request->has('sort_by')) {
            switch ($request->input('sort_by')) {
                case 'newest':
                    $query->orderBy('data_utworzenia', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('data_utworzenia', 'asc');
                    break;
                case 'most_replied':
                    $query->orderBy('posty_count', 'desc');
                    break;
                default:
                    break;
            }
        }

        if ($request->has('tag')) {
            $query->where('tags', 'like', '%' . $request->input('tag') . '%');
        }

        $watki = $query->paginate(10);

        return view('forum.kategoria', compact('kategoria', 'watki'));
    }

    public function showWatek($id)
    {
        $watek = Watek::with(['uzytkownik', 'posty.uzytkownik', 'posty.komentarze.uzytkownik'])->findOrFail($id);
        $posty = $watek->posty;

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

    public function deleteKomentarz($id)
    {
        $komentarz = Komentarz::findOrFail($id);

        if ($komentarz->uzytkownik_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Nie masz uprawnień do usunięcia tego komentarza.');
        }

        $komentarz->delete();

        return redirect()->back()->with('success', 'Komentarz został usunięty.');
    }

    public function editKomentarz(Request $request, $id)
    {
        $komentarz = Komentarz::findOrFail($id);

        if ($komentarz->uzytkownik_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Nie masz uprawnień do edytowania tego komentarza.');
        }

        $komentarz->update([
            'tresc' => $request->input('tresc'),
            'data_edycji' => now()
        ]);

        return redirect()->back()->with('success', 'Komentarz został zaktualizowany.');
    }
}
