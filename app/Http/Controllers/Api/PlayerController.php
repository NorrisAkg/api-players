<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PlayerResource;
use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\PlayerPaginatedResource;
use App\Core\Players\Requests\CreatePlayerRequest;
use App\Core\Players\Repositories\Interfaces\PlayerRepositoryInterface;
use App\Core\Positions\Repositories\Interfaces\PositionRepositoryInterface;

final class PlayerController extends ApiBaseController
{
    public function __construct(protected PlayerRepositoryInterface $playerRepository, protected PositionRepositoryInterface $positionRepository)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $players = $this->playerRepository->getAll(
            params: $request->only(['name', 'position']),
            page: $request->input('page', 1),
            perPage: $request->input('per_page', 10),
            orderBy: $request->input('order_by', 'firstname'),
            sortOrder: $request->input('sort_by', 'asc'),
        );

        return $this->successResponse(data: new PlayerPaginatedResource($players));
    }

    public function create(CreatePlayerRequest $request): JsonResponse
    {
        $body = $request->validated();
        $position = $this->positionRepository->findOne($request->input('position_id'));

        $player = $this->playerRepository->addNew(body: $body, position: $position);

        return $this->successResponse(data: new PlayerResource($player), status: 201);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $position = null;
        $player = $this->playerRepository->findOne($id);
        if ($request->has('position_id'))
            $position = $this->positionRepository->findOne($request->input('position_id'));

        $player = $this->playerRepository->update(player: $player, body: $request->except('position_id'), position: $position);

        return $this->successResponse(data: new PlayerResource($player));
    }
}
