<?php

namespace App\Core\Players\Repositories;

use App\Core\Players\Player;
use App\Core\Positions\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Core\Players\Repositories\Interfaces\PlayerRepositoryInterface;

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
        $query = $this->playerModel->newQuery();

            if(isset($params['name'])) {
                $query = $query->where(DB::raw("CONCAT(firstname, ' ', lastname)"), 'like', '%' . $params['name'] . '%')
                ->orWhere(DB::raw("CONCAT(lastname, ' ', firstname)"), 'like', '%' . $params['name'] . '%');
            }

            if(isset($params['position'])) {
                $query = $query->where('position_id', $params['position']);
            }

        return $query->orderBy($orderBy, $sortOrder)->paginate(page: $page, perPage: $perPage);
    }

    public function addNew(array $body, Position $position): Player
    {
        $player = $this->playerModel->make($body);
        $player->position()->associate($position);
        $player->save();

        return $player;
    }

    public function findOne(string $id): Player
    {
        $player = $this->playerModel->findOrFail($id);

        return $player;
    }

    public function update(Player $player, array $body, Position $position = null): Player
    {
        $player->update($body);
        if(!is_null($position)) {
            $player->position()->associate($position);
            $player->save();
        }

        return $player;
    }

    public function delete(Player $player): bool
    {
        return $player->delete();
    }
}
