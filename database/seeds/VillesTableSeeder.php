<?php

use Illuminate\Database\Seeder;

class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villes = [
            [
                'nom' => 'Paris',
            ],
            [
                'nom' => 'Lyon',
            ],
            [
                'nom' => 'Marseille',
            ],
            [
                'nom' => 'Toulouse',
            ],
            [
                'nom' => 'Bordeaux',
            ],
            [
                'nom' => 'Lille',
            ],
            [
                'nom' => 'Nice',
            ],
            [
                'nom' => 'Nantes',
            ],
            [
                'nom' => 'Rennes',
            ],
            [
                'nom' => 'Strasbourg',
            ],
            [
                'nom' => 'Montpellier',
            ],
            [
                'nom' => 'Madrid',
            ],
            [
                'nom' => 'Barcelone',
            ],
            [
                'nom' => 'Valence',
            ],
            [
                'nom' => 'Séville',
            ],
            [
                'nom' => 'Saragosse',
            ],
            [
                'nom' => 'Malaga',
            ],
            [
                'nom' => 'Murcie',
            ],
            [
                'nom' => 'Palma',
            ],
            [
                'nom' => 'Las Palmas de Gran Canaria',
            ],
            [
                'nom' => 'Bilbao',
            ],
            [
                'nom' => 'Rome',
            ],
            [
                'nom' => 'Milan',
            ],
            [
                'nom' => 'Naples',
            ],
            [
                'nom' => 'Turin',
            ],
            [
                'nom' => 'Palerme',
            ],
            [
                'nom' => 'Gênes',
            ],
            [
                'nom' => 'Bologne',
            ],
            [
                'nom' => 'Florence',
            ],
            [
                'nom' => 'Bari',
            ],
            [
                'nom' => 'Catane',
            ],
            [
                'nom' => 'Venise',
            ],
            [
                'nom' => 'Vérone',
            ],
        ];
        DB::table('villes')->insert($villes);
    }
}
