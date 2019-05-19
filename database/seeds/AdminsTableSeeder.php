<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('kronos603'),
                'remember_token' => null
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('kronos603'),
                'remember_token' => null
            ]
        ];
        DB::table('admins')->insert($admins);
    }
}
