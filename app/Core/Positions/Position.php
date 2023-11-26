<?php

namespace App\Core\Positions;

use App\Core\Players\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    protected $fillable = [
        'label',
        'description',
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
