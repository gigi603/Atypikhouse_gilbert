<?php

use Illuminate\Database\Seeder;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pays = [
            [
                'nom' => 'Allemagne',
            ],
            [
                'nom' => 'Autriche',
            ],
            [
                'nom' => 'Belgique',
            ],
            [
                'nom' => 'Bulgarie',
            ],
            [
                'nom' => 'Chypre',
            ],
            [
                'nom' => 'Croatie',
            ],
            [
                'nom' => 'Danemark',
            ],
            [
                'nom' => 'Espagne',
            ],
            [
                'nom' => 'Estonie',
            ],
            [
                'nom' => 'Finlande',
            ],
            [
                'nom' => 'France',
            ],
            [
                'nom' => 'Grèce',
            ],
            [
                'nom' => 'Hongrie',
            ],
            [
                'nom' => 'Irlande',
            ],
            [
                'nom' => 'Italie',
            ],
            [
                'nom' => 'Lettonie',
            ],
            [
                'nom' => 'Lituanie',
            ],
            [
                'nom' => 'Luxembourg',
            ],
            [
                'nom' => 'Malte',
            ],
            [
                'nom' => 'Pays-Bas',
            ],

            [
                'nom' => 'Pologne',
            ],
            [
                'nom' => 'Portugal',
            ],
            [
                'nom' => 'République tchèque',
            ],
            [
                'nom' => 'Roumanie',
            ],
            [
                'nom' => 'Royaume-Uni',
            ],
            [
                'nom' => 'Slovaquie',
            ],
            [
                'nom' => 'Slovénie',
            ],
            [
                'nom' => 'Suède',
            ],
        ];
        DB::table('pays')->insert($pays);
    }
}
