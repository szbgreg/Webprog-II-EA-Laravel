<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        $sutik = DB::table('suti')->select(DB::raw('COUNT(*) as darab'), 'tipus')->groupBy('tipus')->orderBy('tipus')->get();
        $sutikLabels = $sutik->pluck('tipus');
        $sutikValues = $sutik->pluck('darab');

        $atlagok = DB::table('ar')->select('egyseg', DB::raw('AVG(ertek) as atlagar'))->groupBy('egyseg')->orderByDesc('atlagar')->get();
        $atlagokLabels = $atlagok->pluck('egyseg');
        $atlagokValues = $atlagok->pluck('atlagar')->map(function ($v) {
            return round($v, 0);
        });

        return view('diagram', compact('sutikLabels', 'sutikValues', 'atlagokLabels', 'atlagokValues'));
    }
}
