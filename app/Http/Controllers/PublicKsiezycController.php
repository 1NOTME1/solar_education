<?php

namespace App\Http\Controllers;

use App\Models\Ksiezyc;
use App\Models\Planeta;
use Illuminate\Http\Request;

class PublicKsiezycController extends Controller
{
    public function index()
    {
        $ksiezyce = Ksiezyc::all();
        return view('public.ksiezyce.index', compact('ksiezyce'));
    }

    public function show(Ksiezyc $ksiezyc)
    {
        $planeta = Planeta::find($ksiezyc->planeta_id);
        return view('public.ksiezyce.show', compact('ksiezyc', 'planeta'));
    }
}
