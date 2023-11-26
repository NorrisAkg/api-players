<?php

namespace App\Core\Positions\Repositories\Interfaces;

use App\Core\Positions\Position;
use Illuminate\Support\Collection as Support;

interface PositionRepositoryInterface {
    public function getAll(): Support;

    public function addNew(array $body): Position;

    public function findOne(int $id): Position;

    public function update(Position $position, array $body): Position;

    public function delete(Position $position): bool;
}
