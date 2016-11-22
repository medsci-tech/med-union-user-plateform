<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique()->nullable()->comment('关联的user');
            $table->decimal('number', 20, 2)->nullable()->comment('迈豆数量');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::table('beans', function (Blueprint $table) {
            $table->dropForeign('beans_user_id_foreign');
        });
        Schema::dropIfExists('beans');
    }
}
