<?php

namespace App\Core\Players;

use App\Core\Games\Game;
use App\Core\Positions\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'jersey_number',
        'position',
        'picture',
    ];

    // Set fullname attribute
    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['firstname'] . ' ' . $attributes['lastname']
        );
    }

    // Define relations
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_player')
            ->withPivot(['points_scored', 'assists_delivered', 'distance_delivered'])
            ->withTimestamps();
    }
}
