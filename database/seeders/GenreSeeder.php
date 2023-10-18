<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds - Games Genres
     */
    public function run()
{
    DB::table('genres')->truncate();
    $genres = [
        [            
            'genre_id' => 1,
            'name' => 'Action',            
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            
            'genre_id' => 2,
            'name' => 'Adventure',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 3,
            'name' => 'Role-playing',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 4,
            'name' => 'Sports',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 5,
            'name' => 'Simulation',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 6,
            'name' => 'Company',
            'created_at' => now(),
            'updated_at' => now(),
        ],    
        [
            'genre_id' => 7,
            'name' => 'Software',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 8,
            'name' => 'New Release',
            'created_at' => now(),
            'updated_at' => now(),
        ],  
        [
            'genre_id' => 9,
            'name' => 'Co-Op',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 10,
            'name' => 'Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'genre_id' => 11,
            'name' => 'Update',
            'created_at' => now(),
            'updated_at' => now(),
        ],

    ];
    DB::table('genres')->insertOrIgnore($genres);
}

}

