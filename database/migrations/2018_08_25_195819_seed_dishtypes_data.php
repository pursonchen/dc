<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDishtypesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $dishtypes = [
            [
                'name'                 => '肉类',
            ],[
                'name'                 => '蔬菜',
            ],[
                'name'                 => '靓汤',
            ],[
                'name'                 => '面食',
            ],[
                'name'                 => '糕点',
            ],[
                'name'                 => '粥',
            ],
            
        ];

        DB::table('dishtypes')->insert($dishtypes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('dishtypes')->truncate();
    }
}
