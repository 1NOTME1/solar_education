<?php

namespace App\Http\Controllers;

use App\Models\Zjawisko;
use App\Models\Kategoria;
use Illuminate\Http\Request;

class PublicZjawiskoController extends Controller
{
    public function index()
    {
        $zjawiska = Zjawisko::all();
        return view('public.zjawiska.index', compact('zjawiska'));
    }

    public function show(Zjawisko $zjawisko)
    {
        $kategoria = $zjawisko->kategoria;
        return view('public.zjawiska.show', compact('zjawisko', 'kategoria'));
    }
}
