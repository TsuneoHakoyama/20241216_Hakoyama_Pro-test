<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        $param = [
            'user_id' => 1,
            'shop_id' => 2,
            'date' => $today->copy()->subDay(3)->toDateString(),
            'time' => '18:00',
            'number' => 3,
            'created_at' => $today->copy()->subDay(5)->toDateTimeString()
        ];
        DB::table('bookings')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 4,
            'date' => $today->copy()->subDay(12)->toDateString(),
            'time' => '18:00',
            'number' => 3,
            'created_at' => $today->copy()->subDay(15)->toDateTimeString()
        ];
        DB::table('bookings')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 4,
            'date' => $today->copy()->subDay(6)->toDateString(),
            'time' => '18:00',
            'number' => 2,
            'created_at' => $today->copy()->subDay(7)->toDateTimeString(),
        ];
        DB::table('bookings')->insert($param);
        $param = [
            'user_id' => 3,
            'shop_id' => 4,
            'date' => $today->copy()->subDay(12)->toDateString(),
            'time' => '18:00',
            'number' => 2,
            'created_at' => $today->copy()->subDay(14)->toDateTimeString(),
        ];
        DB::table('bookings')->insert($param);
    }
}
