<?php

namespace Database\Seeders;

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
        $param = [
            'user_id' => 1,
            'shop_id' => 2,
            'rating' => 4,
            'comment' => '静かで上品な雰囲気の中、希少部位をじっくりと堪能できました。',
        ];
        DB::table('reviews')->insert($param);
    }

}
