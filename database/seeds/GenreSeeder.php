<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'genre' => "Roman",
            ],
            [
                'genre' => "Poésie",
            ],
            [
                'genre' => "Documentaire",
            ],
            [
                'genre' => "Histoire",
            ],
            [
                'genre' => "Autobiographie",
            ],
            [
                'genre' => "Bande Dessiné",
            ],
            [
                'genre' => "Policier",
            ],
            [
                'genre' => "Science-Fiction",
            ],
            [
                'genre' => "Fantastique",
            ],
            [
                'genre' => "Comique",
            ]
        ]);
    }
}
