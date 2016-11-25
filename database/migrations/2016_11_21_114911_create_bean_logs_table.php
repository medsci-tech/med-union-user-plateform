<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeanLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bean_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->comment('关联的user');
            $table->unsignedInteger('bean_rate_id')->nullable()->comment('关联的bean_rate');
            $table->decimal('user_beans_before', 20, 2)->nullable()->comment('操作前用户的迈豆');
            $table->decimal('user_beans_after', 20, 2)->nullable()->comment('操作后用户的迈豆');
            $table->decimal('project_beans_before', 20, 2)->nullable()->comment('操作前项目的迈豆');
            $table->decimal('project_beans_after', 20, 2)->nullable()->comment('操作后项目的迈豆');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bean_rate_id')->references('id')->on('bean_rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bean_logs', function (Blueprint $table) {
            $table->dropForeign('bean_logs_user_id_foreign');
            $table->dropForeign('bean_logs_bean_rate_id_foreign');
        });
        Schema::dropIfExists('bean_logs');
    }
}
