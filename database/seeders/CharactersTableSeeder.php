<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('characters')->insert([
          [
              'name' => 'Aragorn',
              'level' => '10',
              'player_name' => 'John Doe',
              'species' => 'Human',
              'alignment' => 'Lawful Good',
              'details' => json_encode(['class' => 'Ranger', 'weapon' => 'Sword']),
              'created_at' => now(),
              'updated_at' => now(),
          ],
          [
              'name' => 'Legolas',
              'level' => '9',
              'player_name' => 'Jane Smith',
              'species' => 'Elf',
              'alignment' => 'Chaotic Good',
              'details' => json_encode(['class' => 'Archer', 'weapon' => 'Bow']),
              'created_at' => now(),
              'updated_at' => now(),
          ],
          [
              'name' => 'Gimli',
              'level' => '8',
              'player_name' => 'Bob Brown',
              'species' => 'Dwarf',
              'alignment' => 'Neutral Good',
              'details' => json_encode(['class' => 'Warrior', 'weapon' => 'Axe']),
              'created_at' => now(),
              'updated_at' => now(),
          ],

       ]);

    }
}
