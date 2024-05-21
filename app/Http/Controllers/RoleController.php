<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('role.index', compact('role'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('role.index')
                        ->with('success', 'Rola została dodana.');
    }

    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        $role->update($request->all());

        return redirect()->route('role.index')
                        ->with('success', 'Rola została zaktualizowana.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index')
                        ->with('success', 'Rola została usunięta.');
    }
}
