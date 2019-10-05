<?php

use Illuminate\Database\Seeder;

class valuecatproprietesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valuecatproprietes = [
            [
                'category_id' => 2,
                'propriete_id' => 2,
                'house_id' => 1
            ],
            [
                'category_id' => 2,
                'propriete_id' => 8,
                'house_id' => 1
            ]
        ];
        DB::table('valuecatproprietes')->insert($valuecatproprietes);
    }
}
