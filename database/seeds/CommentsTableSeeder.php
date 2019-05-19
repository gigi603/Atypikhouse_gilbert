<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'comment' => "C'était une expérience agréable",
                'note' => 3,
                'user_id' => 1,
                'admin_id' => 0,
                'house_id' => 1
            ],
            [
                'comment' => "Merci pour votre réservation",
                'note' => 4,
                'user_id' => 1,
                'admin_id' => 0,
                'house_id' => 1
            ]
        ];
        DB::table('comments')->insert($comments);
    }
}
