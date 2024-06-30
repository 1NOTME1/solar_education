<?php

namespace App\Http\Controllers;

use App\Models\Planeta;
use Illuminate\Http\Request;

class PublicPlanetaController extends Controller
{
    public function index()
    {
        $planety = Planeta::where('status', 1)->get();
        return view('public.planety.index', compact('planety'));
    }

    public function show(Planeta $planeta)
    {
        if ($planeta->status != 1) {
            abort(404);
        }
        return view('public.planety.show', compact('planeta'));
    }
}
