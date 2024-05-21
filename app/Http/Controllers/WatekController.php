<?php

namespace App\Http\Controllers;

use App\Models\Watek;
use App\Models\KategorieForum;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class WatekController extends Controller
{
    public function index()
    {
        $watki = Watek::all();
        return view('watki.index', compact('watki'));
    }

    public function create()
    {
        $kategorie_forum = KategorieForum::all();
        $uzytkownicy = Uzytkownik::all();
        return view('watki.create', compact('kategorie_forum', 'uzytkownicy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tytul' => 'required',
            'kategoria_forum_id' => 'required|exists:kategorie_forum,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
        ]);

        Watek::create($request->all());

        return redirect()->route('watki.index')
                        ->with('success', 'Wątek został dodany.');
    }

    public function show(Watek $watek)
    {
        return view('watki.show', compact('watek'));
    }

    public function edit(Watek $watek)
    {
        $kategorie_forum = KategorieForum::all();
        $uzytkownicy = Uzytkownik::all();
        return view('watki.edit', compact('watek', 'kategorie_forum', 'uzytkownicy'));
    }

    public function update(Request $request, Watek $watek)
    {
        $request->validate([
            'tytul' => 'required',
            'kategoria_forum_id' => 'required|exists:kategorie_forum,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
        ]);

        $watek->update($request->all());

        return redirect()->route('watki.index')
                        ->with('success', 'Wątek został zaktualizowany.');
    }

    public function destroy(Watek $watek)
    {
        $watek->delete();

        return redirect()->route('watki.index')
                        ->with('success', 'Wątek został usunięty.');
    }
}
