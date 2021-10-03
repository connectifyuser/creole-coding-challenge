<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class PassportController extends Controller
{
    
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (auth()->attempt($credentials)) {

            $token = auth()->user()->createToken('AuthForApp')->accessToken;
            
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }


     /**
 * Handles Registration Request
 * @param Request $request
 * @return \Illuminate\Http\JsonResponse
 */

    public function registerUser(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

    $token = $user->createToken('TokenForMobileApp')->accessToken;return response()->json(['token' => $token], 200);
    }
}
