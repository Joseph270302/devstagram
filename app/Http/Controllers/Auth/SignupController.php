<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        // dd($request->get('username'));
        // Validaciones
        $this->validate($request, [
            'name' =>  ['required', 'min:5', 'max:30'],
            'username' => ['required', 'unique:users', 'min:3', 'max:20'],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        User::create([
            'name' => $request->get('name'),
            'username' => Str::slug($request->get('username')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // Autenticar usuario
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('post.index');
    }
}
