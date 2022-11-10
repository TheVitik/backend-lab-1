<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            User::create($request->only(['name']));
        } catch (\Throwable $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Unable to create the user',
                'data' => []
            ], 500);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'The user was created successfully',
            'data' => []
        ]);
    }
}
