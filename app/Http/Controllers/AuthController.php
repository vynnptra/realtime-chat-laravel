<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function signIn() {
        return view('auth.login');
    }

    public function signUp(){
        return view('auth.register');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], );
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('sign-in');
    }
    

    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended('chat'); 
        }
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
    
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
    
        return redirect()->route('sign-in'); 
    }
    
    
}
