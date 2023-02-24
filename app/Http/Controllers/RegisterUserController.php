<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create() {
        return view('register_user.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email' . $user->id],
            'password' => ['required','min:8','confirmed'],
        ]);

        User::create($attributes);

        return redirect('/');
    }
}
