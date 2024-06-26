<?php

namespace App\Http\Controllers;

use App\Models\Ksiezyc;
use App\Models\Planeta;
use Illuminate\Http\Request;

class KsiezycController extends Controller
{
    public function index()
    {
        $ksiezyce = Ksiezyc::with('planeta')->get(); // Pobierz wszystkie księżyce z ich planetami
        return view('ksiezyce.index', compact('ksiezyce'));
    }

    public function create()
    {
        $planety = Planeta::all();
        return view('ksiezyce.create', compact('planety'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'planeta_id' => 'required|integer',
            'opis' => 'nullable|string',
        ]);

        Ksiezyc::create($request->all());

        return redirect()->route('ksiezyce.index')->with('success', 'Księżyc dodany pomyślnie.');
    }

    public function edit($id)
    {
        $ksiezyc = Ksiezyc::findOrFail($id);
        $planety = Planeta::all();
        return view('ksiezyce.edit', compact('ksiezyc', 'planety'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255',
            'planeta_id' => 'required|integer',
            'opis' => 'nullable|string',
        ]);

        $ksiezyc = Ksiezyc::findOrFail($id);
        $ksiezyc->update($request->all());

        return redirect()->route('ksiezyce.index')->with('success', 'Księżyc zaktualizowany pomyślnie.');
    }

    public function destroy($id)
    {
        $ksiezyc = Ksiezyc::findOrFail($id);
        $ksiezyc->status = 0;
        $ksiezyc->save();

        return redirect()->route('ksiezyce.index')
                         ->with('success', 'Księżyc został dezaktywowany.');
    }

}
