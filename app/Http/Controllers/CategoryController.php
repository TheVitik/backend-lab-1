<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(Category::all());
    }

    public function store(Request $request): JsonResponse
    {
        try {
            Category::create($request->only(['name']));
        } catch (\Throwable $e) {
            return new JsonResponse([
                'message' => 'Unable to create a category',
            ], 500);
        }

        return new JsonResponse([
            'message' => 'The category was created successfully',
        ], 201);
    }
}
