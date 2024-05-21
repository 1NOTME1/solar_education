<?php

namespace App\Http\Controllers;

use App\Models\Komentarz;
use App\Models\Post;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class KomentarzController extends Controller
{
    public function index()
    {
        $komentarze = Komentarz::all();
        return view('komentarze.index', compact('komentarze'));
    }

    public function create()
    {
        $posty = Post::all();
        $uzytkownicy = Uzytkownik::all();
        return view('komentarze.create', compact('posty', 'uzytkownicy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tresc' => 'required',
            'post_id' => 'required|exists:posty,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
        ]);

        Komentarz::create($request->all());

        return redirect()->route('komentarze.index')
                        ->with('success', 'Komentarz został dodany.');
    }

    public function show(Komentarz $komentarz)
    {
        return view('komentarze.show', compact('komentarz'));
    }

    public function edit(Komentarz $komentarz)
    {
        $posty = Post::all();
        $uzytkownicy = Uzytkownik::all();
        return view('komentarze.edit', compact('komentarz', 'posty', 'uzytkownicy'));
    }

    public function update(Request $request, Komentarz $komentarz)
    {
        $request->validate([
            'tresc' => 'required',
            'post_id' => 'required|exists:posty,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
        ]);

        $komentarz->update($request->all());

        return redirect()->route('komentarze.index')
                        ->with('success', 'Komentarz został zaktualizowany.');
    }

    public function destroy(Komentarz $komentarz)
    {
        $komentarz->delete();

        return redirect()->route('komentarze.index')
                        ->with('success', 'Komentarz został usunięty.');
    }
}
