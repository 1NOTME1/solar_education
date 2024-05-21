<?php

namespace App\Http\Controllers;

use App\Models\KategorieZjawisk;
use Illuminate\Http\Request;

class KategorieZjawiskController extends Controller
{
    public function index()
    {
        $kategorie_zjawisk = KategorieZjawisk::all();
        return view('kategorie_zjawisk.index', compact('kategorie_zjawisk'));
    }

    public function create()
    {
        return view('kategorie_zjawisk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        KategorieZjawisk::create($request->all());

        return redirect()->route('kategorie_zjawisk.index')
                        ->with('success', 'Kategoria zjawisk została dodana.');
    }

    public function show(KategorieZjawisk $kategorie_zjawisk)
    {
        return view('kategorie_zjawisk.show', compact('kategorie_zjawisk'));
    }

    public function edit(KategorieZjawisk $kategorie_zjawisk)
    {
        return view('kategorie_zjawisk.edit', compact('kategorie_zjawisk'));
    }

    public function update(Request $request, KategorieZjawisk $kategorie_zjawisk)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        $kategorie_zjawisk->update($request->all());

        return redirect()->route('kategorie_zjawisk.index')
                        ->with('success', 'Kategoria zjawisk została zaktualizowana.');
    }

    public function destroy(KategorieZjawisk $kategorie_zjawisk)
    {
        $kategorie_zjawisk->delete();

        return redirect()->route('kategorie_zjawisk.index')
                        ->with('success', 'Kategoria zjawisk została usunięta.');
    }
}
