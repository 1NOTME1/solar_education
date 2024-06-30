<?php

namespace App\Http\Controllers;

use App\Models\Ksiezyc;
use App\Models\Planeta;
use Illuminate\Http\Request;

class PublicKsiezycController extends Controller
{
    public function index()
    {
        $ksiezyce = Ksiezyc::where('status', 1)->get();
        return view('public.ksiezyce.index', compact('ksiezyce'));
    }

    public function show(Ksiezyc $ksiezyc)
    {
        if ($ksiezyc->status != 1) {
            abort(404);
        }
        $planeta = Planeta::find($ksiezyc->planeta_id);
        return view('public.ksiezyce.show', compact('ksiezyc', 'planeta'));
    }
}
