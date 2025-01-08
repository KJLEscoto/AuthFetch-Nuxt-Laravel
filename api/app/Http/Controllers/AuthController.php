<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function index(Request $request)
    {
        return $request->user();
    }

    public function getUsers(Request $request)
    {
        // Fetch all users (you can customize the query as needed)
        $users = User::select('id', 'name', 'email', 'created_at')->get();
        // Return the users as JSON response
        return response()->json([
            'users' => $users
        ], 200);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email|max:255|email',
            'password' => 'required|string|confirmed|min:8|max:255'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Invalid Login Credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function destroy(Request $request) 
    {
        $request->user()->tokens()->delete();
        
        return response()->json(['message' => 'Logged out successfully']);
    }
}