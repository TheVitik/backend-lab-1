<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    public function store(Request $request): JsonResponse
    {
        try {
            Category::create($request->only(['name']));
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to create a category',
            ], 500);
        }

        return response()->json([
            'message' => 'The category was created successfully',
        ], 201);
    }
}
