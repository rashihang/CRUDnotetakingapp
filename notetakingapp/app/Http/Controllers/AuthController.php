<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
class AuthController extends Controller
{

    public function register(UserRegisterRequest $request){
       $validateData = $request ->validated();
       $user = User::create([
           'name' => $validateData['name'],
           'email' => $validateData['email'],
           'password' => bcrypt($validateData['password']),
       ]);
       $token = auth()->login($user);
       return $this->respondWithToken($token);

   }

    public function login(Request $request)
    {
        $credentials = $request->only (['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
