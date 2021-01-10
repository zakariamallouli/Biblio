<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tages')->insert([
            [
                'tage' => "Famille",
            ],
            [
                'tage' => "Animaux",
            ],
            [
                'tage' => "Fiction",
            ],
            [
                'tage' => "Science",
            ],
            [
                'tage' => "Historique",
            ],
            [
                'tage' => "Art",
            ],
            [
                'tage' => "Horreur",
            ],
            [
                'tage' => "Policier",
            ],
            [
                'tage' => "Nature",
            ],
            [
                'tage' => "Comedy",
            ]
        ]);
    }
}
