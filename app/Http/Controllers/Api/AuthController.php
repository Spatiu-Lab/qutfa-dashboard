<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $user['token'] = $user->createToken('my-app-token')->plainTextToken;


        return UserResource::make($user);
    }

    public function register(RegisterRequest $request) {

        return DB::transaction(function() use($request) {
            $data = $request->validated();

            $data['password'] = bcrypt($request->password);

            $customer = Customer::create($data);

            $user = $customer->user()->create($data);

            $user['token'] = $user->createToken('my-app-token')->plainTextToken;

            return UserResource::make($user);
        });

    }

    public function profile(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        auth()->user()->update($data);

        return UserResource::make(auth()->user());
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'loggedout'
        ]);
    }
}
