<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();        

        if (!$user || !\Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Request Token Gagal'
            ], 401);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'message'   => 'success',
            'user'      => $user,
            'token'     => $token,   
        ], 200);
    }

    public function register(Request $request){
        $this->validate($request, [
            'name'  => 'required|unique:users',
            'email'     => 'required|unique:users',
            'password'  => 'required',
        ]);

        return User::create([
            'name'  => $request->json('name'),
            'email'     => $request->json('email'),
            'password'  => bcrypt($request->json('password'))
        ]);
    }
}
