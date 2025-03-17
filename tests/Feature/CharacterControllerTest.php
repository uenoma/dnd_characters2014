<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Character;
use Illuminate\Support\Facades\Hash;

class CharacterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        Character::factory()->count(3)->create();

        $response = $this->get('/api/characters');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function testShow()
    {
        $character = Character::factory()->create();

        $response = $this->get("/api/characters/{$character->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $character->id,
                     'name' => $character->name,
                     'level' => $character->level,
                     'player_name' => $character->player_name,
                     'species' => $character->species,
                     'alignment' => $character->alignment,
                 ]);
    }

    public function testStore()
    {
        $data = [
            'name' => 'Test Character',
            'level' => '1',
            'player_name' => 'Test Player',
            'species' => 'Human',
            'alignment' => 'Neutral',
            'details' => json_encode(['strength' => 10, 'dexterity' => 10]),
            'password' => 'password123',
        ];

        $response = $this->post('/api/characters', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Character created successfully',
                     'character' => [
                         'name' => 'Test Character',
                         'level' => '1',
                         'player_name' => 'Test Player',
                         'species' => 'Human',
                         'alignment' => 'Neutral',
                         'details' => json_encode(['strength' => 10, 'dexterity' => 10]),
                     ],
                 ]);
    }

    public function testUpdate()
    {
        $character = Character::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $data = [
            'name' => 'Updated Character',
            'level' => '2',
            'player_name' => 'Updated Player',
            'species' => 'Elf',
            'alignment' => 'Good',
            'details' => json_encode(['strength' => 12, 'dexterity' => 14]),
            'password' => 'password123',
        ];

        $response = $this->put("/api/characters/{$character->id}", $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Character updated successfully',
                     'character' => [
                         'name' => 'Updated Character',
                         'level' => '2',
                         'player_name' => 'Updated Player',
                         'species' => 'Elf',
                         'alignment' => 'Good',
                         'details' => json_encode(['strength' => 12, 'dexterity' => 14]),
                     ],
                 ]);
    }

    public function testDestroy()
    {
        $character = Character::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $data = [
            'password' => 'password123',
        ];

        $response = $this->delete("/api/characters/{$character->id}", $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Character deleted successfully',
                 ]);
    }
}