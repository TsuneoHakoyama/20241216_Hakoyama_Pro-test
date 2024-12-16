<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
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
            'rating' => 4,
            'comment' => '静かで上品な雰囲気の中、希少部位をじっくりと堪能できました。',
            'created_at' => $today->copy()->subDay(5)->toDateTimeString(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 4,
            'rating' => 5,
            'comment' => 'おしゃれなお店で、ワインもおいしかったです。',
            'created_at' => $today->copy()->subDay(20)->toDateTimeString(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'shop_id' => 4,
            'rating' => 4,
            'comment' => 'おしゃれなお店で、ワインもおいしかったです。',
            'image' => 'storage/images/reviews/pizza.jpg',
            'created_at' => $today->copy()->subDay(10)->toDateTimeString(),
        ];
        DB::table('reviews')->insert($param);
    }

}
