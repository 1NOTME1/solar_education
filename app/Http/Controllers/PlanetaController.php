<?php

namespace App\Http\Controllers;

use App\Models\Planeta;
use Illuminate\Http\Request;

class PlanetaController extends Controller
{
    public function index()
    {
        $planety = Planeta::all();
        return view('planety.index', compact('planety'));
    }

    public function create()
    {
        return view('planety.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
            'typ' => 'required',
            'masa' => 'required|numeric',
            'odleglosc_od_slonca' => 'required|numeric',
        ]);

        Planeta::create($request->all());

        return redirect()->route('planety.index')
                        ->with('success', 'Planeta została dodana.');
    }

    public function show(Planeta $planeta)
    {
        return view('planety.show', compact('planeta'));
    }

    public function edit(Planeta $planeta)
    {
        return view('planety.edit', compact('planeta'));
    }

    public function update(Request $request, Planeta $planeta)
    {
        $request->validate([
            'nazwa' => 'required',
            'typ' => 'required',
            'masa' => 'required|numeric',
            'odleglosc_od_slonca' => 'required|numeric',
        ]);

        $planeta->update($request->all());

        return redirect()->route('planety.index')
                        ->with('success', 'Planeta została zaktualizowana.');
    }

    public function destroy(Planeta $planeta)
    {
        $planeta->delete();

        return redirect()->route('planety.index')
                        ->with('success', 'Planeta została usunięta.');
    }
}
