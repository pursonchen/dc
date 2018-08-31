<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('order_sdate')->comment('用餐开始日期');
            $table->date('order_edate')->comment('用餐结束日期');
            $table->unsignedInteger('canteen_id')->comment('餐厅id');
            $table->foreign('canteen_id')->references('id')->on('canteens');
            $table->unsignedInteger('meal_id')->comment('餐别id');
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->decimal('std', 5, 2)->comment('用餐标准');
            $table->integer('num')->comment('用餐人数');
            $table->text('description')->comment('接待事由');
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
        Schema::dropIfExists('receptions');
    }
}
