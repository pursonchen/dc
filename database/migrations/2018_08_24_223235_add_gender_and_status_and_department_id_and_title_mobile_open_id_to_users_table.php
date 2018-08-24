<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenderAndStatusAndDepartmentIdAndTitleMobileOpenIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //1 男 2 女
            $table->boolean('gender')->default(1)->comment('性别');   
            // 1 正常 0 禁用
            $table->boolean('status')->default(1)->comment('状态');
            // 部门id
            $table->integer('department_id')->unsigned()->default(1)->comment('部门id');
            // 职务
            $table->string('title', 20)->default('普通用户')->comment('职务');
            // 手机号码
            $table->string('mobile', 20)->default('13800000000')->comment('手机号');
            // 微信id
            $table->string('weixin_openid')->unique()->nullable()->after('password')->comment('微信id');
            $table->string('weixin_unionid')->unique()->nullable()->after('weixin_openid')->comment('微信union id');
            //第三方登录不需要密码
            $table->string('password')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('status');
            $table->dropColumn('department_id');
            $table->dropColumn('title');
            $table->dropColumn('mobile');
            $table->dropColumn('weixin_openid');
            $table->dropColumn('weixin_unionid');
            $table->string('password')->nullable(false)->change();
        });
    }
}
