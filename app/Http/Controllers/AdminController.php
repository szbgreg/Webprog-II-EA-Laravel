<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role != 1) {
            return redirect('/');
        }

        $users = User::orderBy('id')->get();

        return view('admin', compact('users'));
    }
}
