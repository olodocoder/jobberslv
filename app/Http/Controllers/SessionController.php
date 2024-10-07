<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $vattributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //try to log user in
        if (!Auth::attempt($vattributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry those creds do not match 😢'
            ]);
        }
        //regenerate session token
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
