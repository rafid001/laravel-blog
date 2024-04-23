<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        
        $attributes = request()->validate([
            'username' => ['required', 'max:255', 'min:3'],
            'name' => ['required', 'max:255'],  
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'max:255', 'min:7'],
        ]);

      

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('message','your account has been created');
    }
}
