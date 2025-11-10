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

    public function edit(User $user)
    {
        return view('edit-user', compact('user'));
    }

    public function updateRole(Request $request, $id)
    {
        if ($request->user()->role != 1) {
            return redirect('/');
        }

        $request->validate([
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Felhasználó jogosultsága frissítve!');
    }
}
