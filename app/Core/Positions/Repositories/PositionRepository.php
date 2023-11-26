<?php

namespace App\Core\Positions\Repositories;

use App\Core\Positions\Position;
use Illuminate\Support\Collection as Support;
use App\Core\Positions\Repositories\Interfaces\PositionRepositoryInterface;

class PositionRepository implements PositionRepositoryInterface {
    public function __construct(protected Position $positionModel)
    {

    }
    public function getAll(): Support {
        return $this->positionModel->all();
    }

    public function addNew(array $body): Position{
        $position = $this->positionModel->create($body);

        return $position;
    }

    public function findOne(int $id): Position{
        $position = $this->positionModel->findOrFail($id);

        return $position;
    }

    public function update(Position $position, array $body): Position{
        $position->update($body);

        return $position;
    }

    public function delete(Position $position): bool{
        return $position->delete();
    }
}
