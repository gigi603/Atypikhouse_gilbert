<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = [
            [
                'user_id' => 1,
                'house_id' => 1,
                'category_id' => 3,
                'price' => 400,
                'total' => 1200,
                'days' => 3,
                'reserved' => 1,
                'start_date' => '2018-01-11',
                'end_date' => '2018-01-12',
                'nb_personnes' => 2
            ],
            [
                'user_id' => 2,
                'house_id' => 1,
                'category_id' => 3,
                'price' => 400,
                'total' => 1200,
                'days' => 3,
                'reserved' => 1,
                'start_date' => '2020-01-13',
                'end_date' => '2020-01-14',
                'nb_personnes' => 4
            ]
        ];
        DB::table('reservations')->insert($reservations);
    }
}
