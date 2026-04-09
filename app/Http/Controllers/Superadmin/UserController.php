<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('superadmin.user.index', compact('users'));
    }

    public function create()
    {
        return view('superadmin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => ['required', Rule::in(['admin', 'user'])], // Penting!
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,   // ← Ini yang menentukan admin atau user
        ]);

        return redirect('/superadmin/users')
                ->with('success', 'Berhasil menambahkan ' . ucfirst($request->role));
    }
}