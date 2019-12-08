<?php

use Illuminate\Database\Seeder;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsletters = [
            [
                'title' => 'Réduction de la cabane dans les arbres',
                'category_id' => 1,
                'adresse' => '31 rue des peupliers 75013 Paris France',
                'description' => 'Voici une promotion de 50% à ne pas rater, cette offre est valide du 1er décembre au 1er janvier',
                'price' => 20.00,
                'reduction' => 50,
                'statut' => 1

            ]
        ];
        DB::table('newsletters')->insert($newsletters);
    }
}
