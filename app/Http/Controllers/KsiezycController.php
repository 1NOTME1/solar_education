<?php

namespace App\Http\Controllers;

use App\Models\Ksiezyc;
use App\Models\Planeta;
use Illuminate\Http\Request;

class KsiezycController extends Controller
{
    public function index()
    {
        $ksiezyce = Ksiezyc::all();
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
            'nazwa' => 'required',
            'planeta_id' => 'required|exists:planety,id',
        ]);

        Ksiezyc::create($request->all());

        return redirect()->route('ksiezyce.index')
                        ->with('success', 'Księżyc został dodany.');
    }

    public function show(Ksiezyc $ksiezyc)
    {
        return view('ksiezyce.show', compact('ksiezyc'));
    }

    public function edit(Ksiezyc $ksiezyc)
    {
        $planety = Planeta::all();
        return view('ksiezyce.edit', compact('ksiezyc', 'planety'));
    }

    public function update(Request $request, Ksiezyc $ksiezyc)
    {
        $request->validate([
            'nazwa' => 'required',
            'planeta_id' => 'required|exists:planety,id',
        ]);

        $ksiezyc->update($request->all());

        return redirect()->route('ksiezyce.index')
                        ->with('success', 'Księżyc został zaktualizowany.');
    }

    public function destroy(Ksiezyc $ksiezyc)
    {
        $ksiezyc->delete();

        return redirect()->route('ksiezyce.index')
                        ->with('success', 'Księżyc został usunięty.');
    }
}
