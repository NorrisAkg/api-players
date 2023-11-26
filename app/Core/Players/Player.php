<?php

namespace App\Core\Players;

use App\Core\Positions\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['firstname'] . ' ' . $attributes['lastname']
        );
    }
}
