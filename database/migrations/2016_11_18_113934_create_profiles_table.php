<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->comments('关联的user表记录。注意user表用来存储用户鉴权信息，profiles表是该用户的个人资料，二者为一对一关系，允许为空。');
            $table->string('role')->nullable()->comments('用户角色。这里是资料中用户的分类，不涉及逻辑，注意跟role表区分。');
            $table->string('title')->nullable()->comments('职称');
            $table->string('office')->nullable()->comments('科室');
            $table->string('province')->nullable()->comments('省份');
            $table->string('city')->nullable()->comments('城市');
            $table->string('hospital_name')->nullable()->comments('所属医院名称');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign('profiles_user_id_foreign');
        });
        Schema::dropIfExists('profiles');
    }
}
