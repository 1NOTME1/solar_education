<?php

namespace App\Http\Controllers;

use App\Models\KategoriaForum;
use Illuminate\Http\Request;

class KategorieForumController extends Controller
{
    public function index()
    {
        $kategorie_forum = KategoriaForum::all();
        return view('kategorie_forum.index', compact('kategorie_forum'));
    }

    public function create()
    {
        return view('kategorie_forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
        ]);

        KategoriaForum::create([
            'nazwa' => $request->nazwa,
        ]);

        return redirect()->route('kategorie_forum.index')->with('success', 'Kategoria forum została dodana.');
    }

    public function show(KategoriaForum $kategorie_forum)
    {
        return view('kategorie_forum.show', compact('kategorie_forum'));
    }

    public function edit(KategoriaForum $kategorie_forum)
    {
        return view('kategorie_forum.edit', compact('kategorie_forum'));
    }

    public function update(Request $request, KategoriaForum $kategorie_forum)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
        ]);

        $kategorie_forum->update([
            'nazwa' => $request->nazwa,
        ]);

        return redirect()->route('kategorie_forum.index')->with('success', 'Kategoria forum została zaktualizowana.');
    }

    public function destroy(KategoriaForum $kategorie_forum)
    {
        $kategorie_forum->delete();

        return redirect()->route('kategorie_forum.index')->with('success', 'Kategoria forum została usunięta.');
    }
}
