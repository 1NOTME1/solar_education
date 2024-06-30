<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Zjawisko;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('data_publikacji', 'desc')->take(3)->get();
        $upcomingEvents = Zjawisko::where('data_zjawiska', '>=', now())->orderBy('data_zjawiska')->take(3)->get();
        $popularPhenomena = Zjawisko::orderBy('status', 'desc')->take(3)->get();

        return view('dashboard', compact('posts', 'upcomingEvents', 'popularPhenomena'));
    }
}
