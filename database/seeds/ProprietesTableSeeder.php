<?php

use Illuminate\Database\Seeder;

class ProprietesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proprietes = [
            [
                'propriete' => 'wifi',
                'category_id' => 1
            ],
            [
                'propriete' => 'wifi',
                'category_id' => 2
            ],
            [
                'propriete' => 'wifi',
                'category_id' => 3
            ],
            [
                'propriete' => 'wifi',
                'category_id' => 4
            ],
            [
                'propriete' => 'wifi',
                'category_id' => 5
            ],
            [
                'propriete' => 'wifi',
                'category_id' => 6
            ],
            [
                'propriete' => 'chauffage',
                'category_id' => 1
            ],
            [
                'propriete' => 'chauffage',
                'category_id' => 2
            ],
            [
                'propriete' => 'chauffage',
                'category_id' => 3
            ],
            [
                'propriete' => 'chauffage',
                'category_id' => 4
            ],
            [
                'propriete' => 'chauffage',
                'category_id' => 5
            ],
            [
                'propriete' => 'chauffage',
                'category_id' => 6
            ]
        ];
        DB::table('proprietes')->insert($proprietes);
    }
}
