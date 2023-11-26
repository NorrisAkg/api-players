<?php

namespace App\Core\GamePlayers\Repositories;

use App\Core\GamePlayers\GamePlayer;
use App\Core\Players\Player;
use App\Core\Positions\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Core\GamePlayers\Repositories\Interfaces\GamePlayerRepositoryInterface;

final class GamePlayerRepository implements GamePlayerRepositoryInterface
{
    public function __construct(protected GamePlayer $model)
    {
    }

    public function findOne(int $game_id, string $player_id): GamePlayer | null
    {
        $gamePlayer = $this->model
            ->newQuery()
            ->where('game_id', $game_id)
            ->where('player_id', $player_id)
            ->first();

        return $gamePlayer;
    }


    public function findById(int $id): GamePlayer
    {
        $gamePlayer = $this->model->findOrFail($id);

        return $gamePlayer;
    }

    // public function getPlayerStatistics(string $id): GamePlayers
    // {
    // }
}
