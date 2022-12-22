<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CreateRecordRequest;
use App\Http\Requests\V1\GetRecordsRequest;
use App\Http\Resources\V1\RecordResource;
use App\Models\Record;
use Illuminate\Http\JsonResponse;

use function response;

class RecordController extends Controller
{
    public function index(GetRecordsRequest $request): JsonResponse
    {
        $records = ! $request->has('category_id')
            ? Record::getByUser($request->validated('user_id'))
            : Record::getByUserAndCategory(
                $request->validated('user_id'),
                $request->validated(['category_id'])
            );

        return response()->json(RecordResource::collection($records));
    }

    public function store(CreateRecordRequest $request): JsonResponse
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
