<?php

namespace App\Http\Controllers;

use App\Models\Suti;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function read()
    {
        $sutik = Suti::latest()->paginate(15);

        return view('sutik', compact('sutik'));
    }

    public function create()
    {
        return view('new-suti');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nev' => 'required|min:3',
                'tipus' => 'required|min:3',
            ],
            [
                'nev.required' => 'A süti nevének megadása kötelező.',
                'nev.min' => 'A süti neve legalább 3 karakter kell legyen.',
                'tipus.required' => 'A tipus megadása kötelező.',
                'tipus.min' => 'A tipus legalább 3 karakter kell legyen.',
            ],

        );

        $suti = Suti::create($request->all());

        if (! is_null($suti)) {
            return back()->with('success', 'A süti hozzáadása sikeres volt!');
        } else {
            return back()->with('failed', 'Hiba történt. A süti mentése sikertelen.');
        }
    }

    public function show(Suti $suti)
    {
        return view('show-suti', compact('suti'));
    }

    public function edit(Suti $suti)
    {
        return view('edit-suti', compact('suti'));
    }

    public function update(Request $request, Suti $suti)
    {
        $request->validate(
            [
                'nev' => 'required|min:3',
                'tipus' => 'required|min:3',
            ],
            [
                'nev.required' => 'A süti nevének megadása kötelező.',
                'nev.min' => 'A süti neve legalább 3 karakter kell legyen.',
                'tipus.required' => 'A tipus megadása kötelező.',
                'tipus.min' => 'A tipus legalább 3 karakter kell legyen.',
            ],
        );

        $suti = $suti->update($request->all());

        if (! is_null($suti)) {
            return back()->with('success', 'A süti módosítása sikeresen megtörtént!');
        } else {
            return back()->with('failed', 'Hiba történt. A süti módosítása sikertelen.');
        }
    }

    public function destroy(Suti $suti)
    {
        $suti = $suti->delete();

        if (! is_null($suti)) {
            return back()->with('success', 'A süti törlése sikeres!');
        } else {
            return back()->with('failed', 'Hiba történt. A süti törlése sikertelen.');
        }
    }
}
