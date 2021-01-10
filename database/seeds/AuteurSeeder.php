<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auteurs')->insert([
            [
                'nom' => 'zakaria',
                'prenom' => 'mallouli',
                'nationalite' => 'France',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'marouane',
                'prenom' => 'ettaki',
                'nationalite' => 'Maroc',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'anass',
                'prenom' => 'soukant',
                'nationalite' => 'Belgique',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'wail',
                'prenom' => 'naceur',
                'nationalite' => 'Maroc',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'hamza',
                'prenom' => 'mallouli',
                'nationalite' => 'France',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'yahya',
                'prenom' => 'ettaki',
                'nationalite' => 'Egypt',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'wassim',
                'prenom' => 'najeh',
                'nationalite' => 'France',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ],[
                'nom' => 'abdo',
                'prenom' => 'track',
                'nationalite' => 'Algerie',
                'biographie' => "On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.",
            ]
        ]);
    }
}
