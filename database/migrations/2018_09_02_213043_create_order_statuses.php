<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
                $table->increments('id');
            $table->date('order_date')->comment('用餐日期')->index();
            $table->string('canteen')->comment('餐厅');
            $table->integer('breakfast_count')->unsigned()->default(0)->comment('早餐人数');
            $table->integer('lunch_count')->unsigned()->default(0)->comment('午餐人数');
            $table->integer('supper_count')->unsigned()->default(0)->comment('晚餐人数');
            $table->integer('reception_breakfast_count')->unsigned()->default(0)->comment('接待早餐人数');
            $table->integer('reception_lunch_count')->unsigned()->default(0)->comment('接待午餐人数');
            $table->integer('reception_supper_count')->unsigned()->default(0)->comment('接待晚餐人数');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
