<?php

namespace App\App\Assets\Controllers;

use App\App\Assets\Requests\UploadRequest;
use App\Domain\Assets\Actions\UploadAction;
use App\Infra\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    public function __construct(protected UploadAction $upload)
    {
    }

    public function __invoke(UploadRequest $request): JsonResponse
    {
        $this->upload->execute($request->dto());

        return response()->json([
            'message' => 'image uploaded successfully',
        ], 201);
    }
}
