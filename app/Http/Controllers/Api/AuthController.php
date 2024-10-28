<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = uploadImage($file, "uploads/users_images");
            $input['image_path'] = $path;
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json(['data' => $success, 'message' => "registerd successfully"], 201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            return response()->json(['data' => $success, 'message' => "Logged in successfully"], 200);
        } else {
            return response()->json(['message' => "Logged in faild"], 400);
        }
    }

    public function logout()
    {
       auth()->user()->tokens()->delete();
        // Others way:
        // auth()->logout();
        // Auth::logout();
        return response()->json([
            'message' => "Logged out successfully"
        ], 204);
    }
}
