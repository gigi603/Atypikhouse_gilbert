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
                'category_id' => 2,
                'propriete_id' => 1,
                'house_id' => 1
            ],
            [
                'value' => '1',
                'category_id' => 2,
                'propriete_id' => 8,
                'house_id' => 1
            ]
        ];
        DB::table('valuecatProprietes')->insert($valuecatproprietes);
    }
}
