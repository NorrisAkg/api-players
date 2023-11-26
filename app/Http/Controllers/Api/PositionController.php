<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PositionResource;
use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\PositionPaginatedResource;
use App\Core\Positions\Requests\CreatePositionRequest;
use App\Core\Positions\Repositories\Interfaces\PositionRepositoryInterface;

final class PositionController extends ApiBaseController
{
    public function __construct(protected PositionRepositoryInterface $positionRepository)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $positions = $this->positionRepository->getAll();

        return $this->successResponse(data: PositionResource::collection($positions));
    }

    public function create(CreatePositionRequest $request): JsonResponse
    {
        $body = $request->validated();

        $position = $this->positionRepository->addNew(body: $body);

        return $this->successResponse(data: new PositionResource($position), status: 201);
    }
}
