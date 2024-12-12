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
            'user_id' => 4,
            'shop_id' => 2,
            'rating' => 5,
            'comment' => '静かで上品な雰囲気の中、希少部位をじっくりと堪能できました。',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 4,
            'rating' => 5,
            'comment' => '古民家の独特の雰囲気の中おいしいワインがいただけました。',
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 7,
            'shop_id' => 10,
            'rating' => 5,
            'comment' => 'ネタの大きさに大満足でした。',
        ];
        DB::table('reviews')->insert($param);
    }

}
