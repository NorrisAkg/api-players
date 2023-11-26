<?php

namespace App\Core\GamePlayers;

use App\Core\Games\Game;
use App\Core\Players\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GamePlayer extends Model
{
    protected $table = 'game_player';

    protected $fillable = [
        'points_scored',
        'assists_delivered',
        'distance_delivered',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
