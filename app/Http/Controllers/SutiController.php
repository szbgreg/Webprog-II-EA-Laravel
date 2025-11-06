<?php

namespace App\Http\Controllers;

use App\Models\Suti;

class SutiController extends Controller
{
    public function index()
    {
        $sutik = Suti::with(['arak', 'tartalmak'])->paginate(15);

        return view('database', compact('sutik'));
    }
}
