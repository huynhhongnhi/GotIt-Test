<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RawardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->insert([
            [
                'name' => 'Iphone',
                'quality' => 3
            ],[
                'name' => 'Một triệu tiền mặt',
                'quality' => 7
            ],[
                'name' => 'Vé xem phim',
                'quality' => 15
            ]
        ]);
    }
}
