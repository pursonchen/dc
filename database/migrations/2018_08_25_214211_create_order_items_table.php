<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->comment('对应订单id');;
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedInteger('canteen_id')->comment('餐厅id');
            $table->foreign('canteen_id')->references('id')->on('canteens');
            $table->unsignedInteger('meal_id')->comment('餐别id');
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->date('order_date')->comment('下单日期');
            $table->unsignedInteger('dish_id')->comment('菜品id');
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->unsignedInteger('amount')->default(1)->comment('数量');
            $table->decimal('price', 10, 2)->comment('单价');
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
        Schema::dropIfExists('order_items');
    }
}
