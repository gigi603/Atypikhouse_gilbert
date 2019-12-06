<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nom' => 'Trinidad',
                'prenom' => 'Gilbert',
                'email' => 'gilbert.trinidad1@gmail.com',
                'password' => bcrypt('kronos603'),
                'verified' => 0,
                'email_token' => null,
                'statut' => 1,
                'newsletter' => true
            ],
            [
                'nom' => 'test',
                'prenom' => 'test',
                'email' => 'test@gmail.com',
                'password' => bcrypt('kronos603'),
                'verified' => 0,
                'email_token' => null,
                'statut' => 1,
                'newsletter' => false
            ]
        ];
        DB::table('users')->insert($users);
    }
}
