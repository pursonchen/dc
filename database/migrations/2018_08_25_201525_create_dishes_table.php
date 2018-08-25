<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('dishtype_id')->comment('菜品类别id');
            $table->integer('canteen_id')->comment('餐厅id');
            $table->string('unit')->comment('计量单位');
            $table->decimal('price', 6, 2)->comment('单价 6位整数2位有效数字');
            $table->string('pic')->comment('图片');
            $table->string('remark')->comment('备注');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
