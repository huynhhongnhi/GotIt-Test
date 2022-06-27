<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [];
        for ($i = 0; $i < 100; $i++) {
            $datas[] = [
                'name' => null,
                'tell' => '09090909' . $i,
                'point' => rand(5, 19),
                'shop_id' => rand(1, 5),
            ];
        }
        $db = DB::table('staff')->insert($datas);

        if ($db) {
            $staffs = DB::table('staff')->where('point', '>', 9)->get();
            $lists = [];
            foreach ($staffs as $staff) {
                $str = "";
                $chars = "123456789";
                $size = strlen($chars);
                for ($o = 0; $o < 6; $o++) {
                    $str .= $chars[rand(0, $size - 1)];
                }

                $lists[] = [
                    'code' => $str,
                    'staff_id' => $staff->id,
                    'reward_id' => null
                ];
            }

            DB::table('lottery_codes')->insert($lists);
        }
    }
}
