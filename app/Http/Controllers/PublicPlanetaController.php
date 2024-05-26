<?php

namespace App\Http\Controllers;
use App\Models\Planeta;
use Illuminate\Http\Request;

class PublicPlanetaController extends Controller
{
    public function index()
    {
        $planety = Planeta::all();
        return view('public.planety.index', compact('planety'));
    }

    public function show(Planeta $planeta)
    {
        return view('public.planety.show', compact('planeta'));
    }
}
