<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $records = Record::where('user_id', $request->get('user_id'));
        if ($request->has('category_id')) {
            $records = $records->where('category_id', $request->get('category_id'));
        }

        $records = $records->orderBy('created_at', 'DESC')->get();

        return response()->json($records);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            Record::create($request->only(['user_id', 'category_id', 'sum']));
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to create a record',
            ], 500);
        }

        return response()->json([
            'message' => 'The record was created successfully',
        ], 201);
    }
}
