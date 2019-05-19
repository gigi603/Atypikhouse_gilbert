<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'content' => 'Felicitation, vous êtes inscrit chez nous',
                'admin_id' => 1,
                'user_id' => 1
            ],
            [
                'content' => 'L\'administrateur a rajouté une nouvelle propriété à votre annonce',
                'admin_id' => 1,
                'user_id' => 2
            ]
        ];
        DB::table('messages')->insert($messages);
    }
}
