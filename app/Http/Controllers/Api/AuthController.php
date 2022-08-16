<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $user= User::where('phone', $request->phone)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['هذه البيانات لا تتطابق مع سجلاتنا.']
                ], 404);
            }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];


        return response($response, 201);
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        return response()->noContent();
    }
}
