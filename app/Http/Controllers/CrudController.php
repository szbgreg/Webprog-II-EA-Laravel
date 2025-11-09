<?php

namespace App\Http\Controllers;

use App\Models\Suti;

class CrudController extends Controller
{
    public function read()
    {
        $sutik = Suti::all();

        return view('crud', compact('sutik'));
    }
}
