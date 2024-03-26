<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function register(Request $r){
        try {
            $email_exist = User::where('email', $r->email)->first();
        if($email_exist){
            return response('Email already exists', 200)
            ->header('Content-Type', 'text/plain');
        } else {
            $user = User::create([
                'name' => $r->name,
                'email' => $r->email, 
                'password' => Hash::make($r->password),
            ]);
            Auth::login($user, $remember = true);
            return response('Registerd succesfully', 200)
            ->header('Content-Type', 'text/plain');
        }
        } catch (\Throwable $th) {
            abort(500);
        }
        
    }
    public function login(Request $r)
    {
        try {
            $user = User::where('email', $r->email)->first();
            if ($user && Hash::check($r->password, $user->password)) {
                Auth::login($user, $remember = true);
                return response('Logged in successfully', 200)
                    ->header('Content-Type', 'text/plain');
            } else {
                return response('Wrong credentials', 500)
                    ->header('Content-Type', 'text/plain');
            }
        } catch (\Throwable $th) {
            return response('Unexpected error occurred', 500)
                ->header('Content-Type', 'text/plain');
        }
    }    
}
