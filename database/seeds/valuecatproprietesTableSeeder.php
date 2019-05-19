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
                'value' => '2',
                'category_id' => 1,
                'propriete_id' => 1,
                'house_id' => 1
            ],
            [
                'value' => '1',
                'category_id' => 2,
                'propriete_id' => 2,
                'house_id' => 2
            ],
            [
                'value' => '3',
                'category_id' => 3,
                'propriete_id' => 3,
                'house_id' => 3
            ],
            [
                'value' => '2',
                'category_id' => 1,
                'propriete_id' => 4,
                'house_id' => 1
            ],
            [
                'value' => '1',
                'category_id' => 2,
                'propriete_id' => 5,
                'house_id' => 2
            ],
            [
                'value' => '3',
                'category_id' => 3,
                'propriete_id' => 6,
                'house_id' => 3
            ]
        ];
        DB::table('valuecatProprietes')->insert($valuecatproprietes);
    }
}
