<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCanteensData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $canteens = [
            [
                'name'        => '第一饭堂',
                'address'     => '主办公楼旁'
            ],
            [
                'name'        => '第二饭堂',
                'address'     => '员工活动室内'
            ]
        ];

        DB::table('canteens')->insert($canteens);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('canteens')->truncate();
    }
}
