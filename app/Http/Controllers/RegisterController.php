<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'min:3','max:255'],
            'username' => ['required', 'min:3','max:255','unique:users'],
            'email' => ['required', 'email:dns', 'unique:users', ],
            'password' => ['required', 'min:5', 'max:255'],
            'password_confirmation' => ['min:5','required','same:password'],

        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration Completed');

    }

}
