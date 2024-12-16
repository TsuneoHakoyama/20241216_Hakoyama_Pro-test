<?php

namespace Database\Seeders;

use CreateAdministratorsTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenresTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(AdministratorsTableSeeder::class);
        $this->call(ShopUsersTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
    }
}
