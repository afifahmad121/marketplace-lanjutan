<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        $users = User::all();
        return $this->successResponse($users);
    }

    public function show(User $users): JsonResponse
    {
        return $this->successResponse($users);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:0',
            'role' => 'required|in:user,buyer|min:0'
        ]);

        $users = User::create($validated);
        return $this->successResponse($users, 'Pesan Sukses');
    }
}

// 'username',
//         'email',
//         'password',
//         'role',
//         'balance',
