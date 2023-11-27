<?php

use App\Core\Players\Player;
use App\Core\Positions\Position;
use App\Http\Resources\PlayerResource;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('player', function () {
    expect(true)->toBeTrue();
});

it('can create player with position', function() {
    $position = Position::factory()->create(['label' => 'Striker']);
    $playerData = [
        'firstname' => 'Norris',
        'lastname'  => 'Akogbede',
        'jersey_number'  => 10,
        'position_id'  => $position->id,
    ];

    $response = $this->postJson('/players', $playerData);

    expect($response)->toContain([
        // 'data' => $playerData,
        'success' => true,
        'message' => 'Success',
    ]);
    // $response->assertJsonContains([
    //     'data' => $playerData,
    //     'success' => true,
    //     'message' => 'Success',
    // ]);

    $this->assertDatabaseHas('players', $playerData);
    // TODO finish implementing
});
