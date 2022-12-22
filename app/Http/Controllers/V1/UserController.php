<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

use function response;

class UserController extends Controller
{
    public function store(CreateUserRequest $request): JsonResponse
    {
        try {
            $user = User::create($request->only(['name']));
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to create the user',
            ], 500);
        }

        return response()->json($user, 201);
    }
}
