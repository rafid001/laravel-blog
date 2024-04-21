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

        // $validator = Validator::make($request->all(), [
        //     'username' => ['required'],
        //     'name' => ['required'],  
        //     'email' => ['required'],
        //     'password' => ['required'],
        // ]);

        // if ($validator->fails()) {
        //     // return redirect('register/create')
        //     //             ->withErrors($validator)
        //     //             ->withInput();
        //     return redirect('/yabadabdo');
        // }

        // User::create([
        //     'username' => $request->username,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        // return redirect('/');
    }
}
