<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'shop-user01',
            'email' => 'shopuser01@example.com',
            'password' => Hash::make('shopuser'),
            'shop_name' => '仙人'
        ];
        DB::table('shop_users')->insert($param);
    }
}
