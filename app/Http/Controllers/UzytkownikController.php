<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UzytkownikController extends Controller
{
    public function index()
    {
        $uzytkownicy = User::all();
        return view('uzytkownicy.index', compact('uzytkownicy'));
    }

    public function create()
    {
        $role = Role::all();
        return view('uzytkownicy.create', compact('role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa_uzytkownika' => 'required',
            'email' => 'required|email|unique:uzytkownicy',
            'haslo' => 'required|min:6',
            'rola_id' => 'required|exists:role,id',
        ]);

        $uzytkownik = new User($request->all());
        $uzytkownik->haslo = bcrypt($request->haslo);
        $uzytkownik->save();

        return redirect()->route('uzytkownicy.index')
                        ->with('success', 'Użytkownik został dodany.');
    }

    public function show(User $uzytkownik)
    {
        return view('uzytkownicy.show', compact('uzytkownik'));
    }

    public function edit(User $uzytkownik)
    {
        $role = Role::all();
        return view('uzytkownicy.edit', compact('uzytkownik', 'role'));
    }

    public function update(Request $request, User $uzytkownik)
    {
        $request->validate([
            'nazwa_uzytkownika' => 'required',
            'email' => 'required|email|unique:uzytkownicy,email,'.$uzytkownik->id,
            'rola_id' => 'required|exists:role,id',
        ]);

        $uzytkownik->update($request->all());
        if ($request->haslo) {
            $uzytkownik->haslo = bcrypt($request->haslo);
            $uzytkownik->save();
        }

        return redirect()->route('uzytkownicy.index')
                        ->with('success', 'Użytkownik został zaktualizowany.');
    }

    public function destroy(User $uzytkownik)
    {
        $uzytkownik->delete();

        return redirect()->route('uzytkownicy.index')
                        ->with('success', 'Użytkownik został usunięty.');
    }
}
