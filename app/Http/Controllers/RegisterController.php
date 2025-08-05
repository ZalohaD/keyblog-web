<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;



class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }


    public function store(Request $request){
        $userData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $publiserData = $request->validate([
            'name' => 'required|max:255',
            'logo' => ['required', File::types(['png', 'jpg', 'webp'])],
        ]);

        $user = User::create($userData);

        $logoPath = $request->logo->store('logos');

        $user->publisher()->create([
            'name' => $publiserData['name'],
            'logo' => $logoPath,
            'slug' => Str::slug($publiserData['name']),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect('/');
    }
}
