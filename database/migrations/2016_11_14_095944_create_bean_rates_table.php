<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeanRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bean_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comments('规则名');
            $table->string('name_en')->unique()->comments('规则英文名，用于检索');
            $table->unsignedInteger('bean_rate_type_id')->nullable()->comments('关联迈豆规则类型id');
            $table->unsignedInteger('project_id')->nullable()->comments('关联的项目名称');
            $table->integer('rate')->default(1)->comments('规则比率，例如学习一次返20迈豆，就设为20');
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
        Schema::dropIfExists('bean_rates');
    }
}
