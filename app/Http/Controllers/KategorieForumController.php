<?php

namespace App\Http\Controllers;

use App\Models\KategorieForum;
use Illuminate\Http\Request;

class KategorieForumController extends Controller
{
    public function index()
    {
        $kategorie_forum = KategorieForum::all();
        return view('kategorie_forum.index', compact('kategorie_forum'));
    }

    public function create()
    {
        return view('kategorie_forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        KategorieForum::create($request->all());

        return redirect()->route('kategorie_forum.index')
                        ->with('success', 'Kategoria forum została dodana.');
    }

    public function show(KategorieForum $kategorie_forum)
    {
        return view('kategorie_forum.show', compact('kategorie_forum'));
    }

    public function edit(KategorieForum $kategorie_forum)
    {
        return view('kategorie_forum.edit', compact('kategorie_forum'));
    }

    public function update(Request $request, KategorieForum $kategorie_forum)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        $kategorie_forum->update($request->all());

        return redirect()->route('kategorie_forum.index')
                        ->with('success', 'Kategoria forum została zaktualizowana.');
    }

    public function destroy(KategorieForum $kategorie_forum)
    {
        $kategorie_forum->delete();

        return redirect()->route('kategorie_forum.index')
                        ->with('success', 'Kategoria forum została usunięta.');
    }
}
