<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(auth()->attempt($attributes)) {
            return redirect("/")->with('message','Welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function destroy(Request $request)
    {
        auth()->logout();

        return redirect("/")->with("message","goodbye!");
    }
}
