<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            [
                'game_id' => 1,
                'title' => 'Bloons TD6',
                'release_date' => "2018-06-14",
                'price' => 1000,
                'description' => 'Bloons TD 6 is a 2018 tower defense game developed and published by Ninja Kiwi. The sixth entry in the Bloons Tower Defense series.',
                'cover' => 'bloons-td6.jpg',
                'cover_description' => 'The game Bloons TD6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 2,
                'title' => 'EA SPORTS™ FIFA 23',
                'release_date' => "2022-09-30",
                'price' => 2600,
                'description' => 'FIFA 23 brings us closer to The Worlds Game with HyperMotion2 technology, the mens and womens FIFA World Cup™ available throughout the season clubs',
                'cover' => 'fifa-23.jpg',
                'cover_description' => 'Cover for the game of Fifa 23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'game_id' => 3,
                'title' => 'It Takes Two',
                'release_date' => "2021-03-26",
                'price' => 4150,
                'description' => 'It Takes Two is an action-adventure platform video game developed by Hazelight Studios and published by Electronic Arts. ',
                'cover' => 'it-takes-two.jpg',
                'cover_description' => 'Cover for the Game It Takes Two',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'game_id' => 4,
                'title' => 'Left 4 Dead 2',
                'release_date' => "2009-10-17",
                'price' => 550,
                'description' => 'Left 4 Dead 2 is a 2009 first-person shooter game developed and published by Valve. The sequel to Turtle Rock Studios Left 4 Dead and the second game in the Left 4 Dead series',
                'cover' => 'left-4-dead.jpg',
                'cover_description' => 'Cover for the Game Left for Dead',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'game_id' => 5,
                'title' => 'A Way Out',
                'release_date' => "2018-03-23",
                'price' => 6150,
                'description' => 'A Way Out is an action-adventure video game, where you play as prisiones that are attempting to break free from their prision.',
                'cover' => 'a-way-out.jpg',
                'cover_description' => 'Cover for A Way Out',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
