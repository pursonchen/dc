<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDepartmentsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $departments = [
            [
                'name'        => '党委',
            ],
            [
                'name'        => '人大',
            ],
            [
                'name'        => '政府',
            ],
            [
                'name'        => '政协',
            ],
        ];

        DB::table('departments')->insert($departments);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('departments')->truncate();
    }
}
