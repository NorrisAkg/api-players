<?php

namespace App\Core\Positions;

use App\Core\Players\Player;
use Database\Factories\PositionFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return PositionFactory::new();
    }

    protected $fillable = [
        'label',
        'description',
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
