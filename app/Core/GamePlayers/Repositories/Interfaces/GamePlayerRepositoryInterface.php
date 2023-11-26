<?php

namespace App\Core\GamePlayers\Repositories\Interfaces;

use App\Core\GamePlayers\GamePlayer;

interface GamePlayerRepositoryInterface {
    public function findById(int $id): GamePlayer;

    public function findOne(int $game_id, string $player_id): GamePlayer | null;

    // public function getPlayerStatistics();
}
