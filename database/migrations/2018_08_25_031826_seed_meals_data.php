<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedMealsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $meals = [
            [
                'name'                 => '早餐',
                'order_start_time'     => '16:00:00',
                'order_end_time'       => '17:00:00',
                'eat_start_time'       => '07:30:00',
                'eat_end_time'         => '08:00:00',

            ],[
                'name'                 => '午餐',
                'order_start_time'     => '16:00:00',
                'order_end_time'       => '17:00:00',
                'eat_start_time'       => '11:30:00',
                'eat_end_time'         => '13:00:00',

            ],[
                'name'                 => '晚餐',
                'order_start_time'     => '16:00:00',
                'order_end_time'       => '17:00:00',
                'eat_start_time'       => '17:30:00',
                'eat_end_time'         => '18:30:00',

            ],
            
        ];

        DB::table('meals')->insert($meals);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('meals')->truncate();
    }

}
