<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function register(RegisterRequest $r)
    {
        try {
            $email_exist = User::where('email', $r->email)->first();
            if (!$email_exist) {
                $user = User::create([
                    'name' => $r->name,
                    'email' => $r->email,
                    'password' => Hash::make($r->password),
                ]);
                Auth::login($user, $remember = true);
                $token = $user->createToken('token')->plainTextToken;
                return response()->json(['token'=>$token], 200);
            } else {
                return response()->json('Email already exists', 403);
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error' ,
                    'message' => 'error encounterd' ,
                    'error' => $e->getMessage(),
                ] , 500
                );
        }
    }
    public function login(LoginRequest $r)
    {
        try {
            $user = User::where('email', $r->email)->first();
            if ($user && Hash::check($r->password, $user->password)) {
                Auth::login($user, $remember = true);
                $token = $user->createToken('token')->plainTextToken;
                return response()->json(['status' => 200, 'token' => $token, 'content' => 'logged in succesfully']);
            } else {
                return response('Wrong credentials', 500)
                    ->header('Content-Type', 'text/plain');
            }
        } catch (\Throwable $th) {
            return response('Unexpected error occurred', 500)
                ->header('Content-Type', 'text/plain');
        }
    }
    public function logout(Request $r)
    {
        $r->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out', 'status' => true], 200);
    }
}
