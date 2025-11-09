<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        $sutik = DB::table('suti')->select(DB::raw('COUNT(*) as darab'), 'tipus')->groupBy('tipus')->orderBy('tipus')->get();
        $labels = $sutik->pluck('tipus');
        $values = $sutik->pluck('darab');

        return view('diagram', compact('labels', 'values'));
    }
}
