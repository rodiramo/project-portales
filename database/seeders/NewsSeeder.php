<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('news')->insert([
            [
                'news_id' => 1,
                'title' => 'Sony confirms release date for God of War: Ragnarok',
              
                'description' => 'Sony has officially announced that God of War: Ragnarok will be released on October 27, 2023, exclusively for the PlayStation 5.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'news_id' => 2,
                'title' => 'Microsoft acquires game developer Bethesda Softworks',
           
                'description' => 'Microsoft has completed its acquisition of Bethesda Softworks, the game developer behind popular franchises like The Elder Scrolls and Fallout.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'news_id' => 3,
                'title' => 'New Pokemon games announced for Nintendo Switch',
           
                'description' => 'Nintendo has announced two new Pokemon games for the Nintendo Switch: Pokemon Legends: Arceus and a remastered version of Pokemon Diamond and Pearl.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'news_id' => 4,
                'title' => 'Valve announces new Steam Deck handheld gaming device',

                'description' => 'Valve has announced the Steam Deck, a new handheld gaming device that will run PC games and connect to a TV or monitor.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],      
            [
                'news_id' => 5,
                'title' => 'Sony announces new VR headset for PlayStation 5',
    
                'description' => 'Sony has announced a new virtual reality headset for the PlayStation 5, which promises to offer improved resolution and field of view.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],      
            [
                'news_id' => 6,
                'title' => 'GTA V is now the best-selling game of all time in the US',
       
                'description' => 'Grand Theft Auto V has surpassed Minecraft to become the best-selling video game of all time in the United States, according to the NPD Group.',
                'cover' => null,
                'cover_description' => 'cover of Grand Theft Auto 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],      
            [
                'news_id' => 7,
                'title' => 'Ubisoft delays Far Cry 7 and Rainbow Six Quarantine',
           
                'description' => 'Ubisoft has announced that Far Cry 7 and Rainbow Six Quarantine will be delayed to ensure they meet the companys quality standards.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],    
            [
                'news_id' => 8,
                'title' => 'Nintendo reveals new details about Breath of the Wild 2',
        
                'description' => 'Nintendo has revealed new details about The Legend of Zelda: Breath of the Wild 2, including the ability to play as both Link and Zelda.',
                'cover' => null,
                'cover_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
