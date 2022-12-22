<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

use function response;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    public function store(CreateCategoryRequest $request): JsonResponse
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
