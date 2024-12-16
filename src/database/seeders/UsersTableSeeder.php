<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today =Carbon::now();

        $param = [
            'name' => 'ユーザー1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => $today->copy()->subDay(15)->toDateTimeString(),
            'created_at' => $today->copy()->subDay(15)->toDateTimeString(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'ユーザー2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => $today->copy()->subDay(14)->toDateTimeString(),
            'created_at' => $today->copy()->subDay(14)->toDateTimeString(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'ユーザー3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => $today->copy()->subDay(3)->toDateTimeString(),
            'created_at' => $today->copy()->subDay(3)->toDateTimeString(),
        ];
        DB::table('users')->insert($param);
    }
}
