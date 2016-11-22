<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('application_id')->nullable()->comment('应用id');
            $table->string('name')->unique()->comment('项目名称');
            $table->string('name_en')->unique()->comment('项目名称英文，用于检索');
            $table->text('description')->comment('附加描述');
            $table->integer('amount_of_beans')->default(0)->comment('已经充值到此项目的迈豆总额');
            $table->integer('rest_of_beans')->default(0)->comment('项目中剩余迈豆');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
