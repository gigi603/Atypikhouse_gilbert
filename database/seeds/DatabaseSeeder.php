<?php

use App\House;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(HousesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(NewslettersTableSeeder::class);
        $this->call(ProprietesTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(valuecatproprietesTableSeeder::class);
    }
}
