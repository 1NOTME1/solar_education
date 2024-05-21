<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Watek;
use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posty = Post::all();
        return view('posty.index', compact('posty'));
    }

    public function create()
    {
        $watki = Watek::all();
        $uzytkownicy = Uzytkownik::all();
        return view('posty.create', compact('watki', 'uzytkownicy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tresc' => 'required',
            'watek_id' => 'required|exists:watki,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
        ]);

        Post::create($request->all());

        return redirect()->route('posty.index')
                        ->with('success', 'Post został dodany.');
    }

    public function show(Post $post)
    {
        return view('posty.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $watki = Watek::all();
        $uzytkownicy = Uzytkownik::all();
        return view('posty.edit', compact('post', 'watki', 'uzytkownicy'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'tresc' => 'required',
            'watek_id' => 'required|exists:watki,id',
            'uzytkownik_id' => 'required|exists:uzytkownicy,id',
        ]);

        $post->update($request->all());

        return redirect()->route('posty.index')
                        ->with('success', 'Post został zaktualizowany.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posty.index')
                        ->with('success', 'Post został usunięty.');
    }
}
