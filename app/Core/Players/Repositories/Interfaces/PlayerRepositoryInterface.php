<?php

namespace App\Core\Players\Repositories\Interfaces;

use App\Core\Players\Player;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface {
    public function getAll(array $params, ?int $page = 1, ?int $perPage = 10, string $orderBy = 'firstname', string $sortOrder = 'asc'): LengthAwarePaginator;

    public function addNew(array $body): Player;

    public function findOne(int $id): Player;

    public function update(Player $player, array $body): Player;

    public function delete(Player $player): bool;
}
