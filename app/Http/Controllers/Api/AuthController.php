<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }

        $userWithSameEmail = User::where('email', $request->email)->first();
        if ($userWithSameEmail) {
            return response()->json([
                'message' => 'Email alredy exist'
            ], 400);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken(env("JWT_SECRET_KEY"));

        return response()->json([
            'token' => $token->plainTextToken,
        ], 201);;
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => "Email or password wrong",
            ], 400);
        }

        $token = $user->createToken(env("JWT_SECRET_KEY "));

        return response()->json([
            'token' => $token->plainTextToken,
        ], 200);;
    }
}
