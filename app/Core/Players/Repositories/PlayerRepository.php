<?php

namespace App\Core\Players\Repositories;

use App\Core\Players\Player;
use App\Core\Players\Repositories\Interfaces\PlayerRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class PlayerRepository implements PlayerRepositoryInterface
{
    public function __construct(protected Player $playerModel)
    {
    }

    public function getAll(
        array $params,
        ?int $page = 1,
        ?int $perPage = 10,
        string $orderBy = 'firstname',
        string $sortOrder = 'asc'
    ): LengthAwarePaginator {
        $query = $this->playerModel->newQuery()
            ->when($params['name'], function ($q) use ($params) {
                return $q->where(DB::raw("CONCAT(firstname, ' ', lastname)"), 'like', '%' . $params['name'] . '%')
                    ->orWhere(DB::raw("CONCAT(lastname, ' ', firstname)"), 'like', '%' . $params['name'] . '%');
            })
            ->when($params['position'], function ($q) use ($params) {
                return $q->where('position_id', $params['position']);
            });

        return $query->orderBy($orderBy, $sortOrder)->paginate(page: $page, perPage: $perPage);
    }

    public function addNew(array $body): Player
    {
        $player = $this->playerModel->create($body);

        return $player;
    }

    public function findOne(int $id): Player
    {
        $player = $this->playerModel->findOrFail($id);

        return $player;
    }

    public function update(Player $player, array $body): Player
    {
        $player->update($body);

        return $player;
    }

    public function delete(Player $player): bool
    {
        return $player->delete();
    }
}
