<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'admin01',
            'email' => 'admin01@example.com',
            'password' => Hash::make('administrator'),
        ];
        DB::table('administrators')->insert($param);
    }
}
