<?php

namespace App\Http\Controllers;

use App\Models\Zjawisko;
use App\Models\KategorieZjawisk;
use Illuminate\Http\Request;

class ZjawiskoController extends Controller
{
    public function index()
    {
        $zjawiska = Zjawisko::all();
        return view('zjawiska.index', compact('zjawiska'));
    }

    public function create()
    {
        $kategorie = KategorieZjawisk::all();
        return view('zjawiska.create', compact('kategorie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
            'data_zjawiska' => 'required|date',
            'kategoria_id' => 'required|exists:kategorie_zjawisk,id',
        ]);

        Zjawisko::create($request->all());

        return redirect()->route('zjawiska.index')
                        ->with('success', 'Zjawisko zostało dodane.');
    }

    public function show(Zjawisko $zjawisko)
    {
        return view('zjawiska.show', compact('zjawisko'));
    }

    public function edit(Zjawisko $zjawisko)
    {
        $kategorie = KategorieZjawisk::all();
        return view('zjawiska.edit', compact('zjawisko', 'kategorie'));
    }

    public function update(Request $request, Zjawisko $zjawisko)
    {
        $request->validate([
            'nazwa' => 'required',
            'data_zjawiska' => 'required|date',
            'kategoria_id' => 'required|exists:kategorie_zjawisk,id',
        ]);

        $zjawisko->update($request->all());

        return redirect()->route('zjawiska.index')
                        ->with('success', 'Zjawisko zostało zaktualizowane.');
    }

    public function destroy(Zjawisko $zjawisko)
    {
        $zjawisko->delete();

        return redirect()->route('zjawiska.index')
                        ->with('success', 'Zjawisko zostało usunięte.');
    }
}
