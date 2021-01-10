<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livres')->insert([
            [
                'titre' => Str::random(7),
                'image' => '202101080850204481.jpg',
                'langue' => 'FR',
                'qte' => 7,
                'prix' => 50,
                'idauteur' => 2,
                'idgenre' => 3,
                'idtag' => 7,
                'resume' => Str::random(20)
            ],[
                'titre' => Str::random(5),
                'image' => '2021010808512696552.jpg',
                'langue' => 'EN',
                'qte' => 4,
                'prix' => 50,
                'idauteur' => 4,
                'idgenre' => 7,
                'idtag' => 7,
                'resume' => Str::random(20)
            ],[
                'titre' => Str::random(8),
                'image' => '2021010808541463993.jpg',
                'langue' => 'Ar',
                'qte' => 2,
                'prix' => 150,
                'idauteur' => 3,
                'idgenre' => 9,
                'idtag' => 8,
                'resume' => Str::random(20)
            ],[
                'titre' => Str::random(7),
                'image' => '2021010808583934801.jpg',
                'langue' => 'FR',
                'qte' => 10,
                'prix' => 75,
                'idauteur' => 6,
                'idgenre' => 2,
                'idtag' => 1,
                'resume' => Str::random(20)
            ],[
                'titre' => Str::random(7),
                'image' => '2021010809012057571.jpg',
                'langue' => 'AR',
                'qte' => 5,
                'prix' => 200,
                'idauteur' => 6,
                'idgenre' => 3,
                'idtag' => 4,
                'resume' => Str::random(20)
            ],[
                'titre' => Str::random(7),
                'image' => '2021010809072370877.jpg',
                'langue' => 'AR',
                'qte' => 5,
                'prix' => 60,
                'idauteur' => 5,
                'idgenre' => 5,
                'idtag' => 7,
                'resume' => Str::random(20)
            ]
        ]);
    }
}
