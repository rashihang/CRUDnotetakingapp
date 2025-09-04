<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Controllers\AuthController;

//class UserController extends Controller
////{
////    public function register(Request $request) {
////        $incomingFields = $request->validate([
////            'name' => ['required','min:3', 'max:100', Rule::unique('users','name')],
////            'email' => ['required','email', Rule::unique('users','email')],
////            'password' => ['required','min:8','max:200'],
////        ]);
////        $incomingFields['password'] = bcrypt($incomingFields['password']);
////        $user = User::create($incomingFields);
////        auth()->login($user);
////        return redirect('/');
////    }
////}
