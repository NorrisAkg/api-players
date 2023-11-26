<?php

namespace App\Core\Players;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'jersey_number',
        'position',
        'picture',
    ];
}
