<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($success){
            return redirect('/');
        } else{
            return back()->withErrors([
                'message' => "Invalid credentials",
            ]);
        }
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
