<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'name' => 'Cửa Hàng 1',
                'chance_plus' => 10,
                'reward_id' => 1,
            ],[
                'name' => 'Cửa Hàng 2',
                'chance_plus' => null,
                'reward_id' => null,
            ],[
                'name' => 'Cửa Hàng 3',
                'chance_plus' => null,
                'reward_id' => null,
            ],[
                'name' => 'Cửa Hàng 4',
                'chance_plus' => null,
                'reward_id' => null,
            ],[
                'name' => 'Cửa Hàng 5',
                'chance_plus' => null,
                'reward_id' => null,
            ]
        ]);
    }
}
