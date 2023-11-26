<?php

namespace App\Core\Games;

use App\Core\Players\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    protected $fillable = [
        'reference',
        'opponent',
        'host_score',
        'opponent_score',
    ];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'game_player')
            ->withPivot(['points_scored', 'assists_delivered', 'distance_delivered'])
            ->withTimestamps();
    }
}
