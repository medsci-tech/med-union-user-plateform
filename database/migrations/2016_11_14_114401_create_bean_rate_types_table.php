<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeanRateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bean_rate_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comments('规则类型');
            $table->string('name_en')->unique()->comments('规则类型英文名，用于检索');
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
        Schema::dropIfExists('bean_rate_types');
    }
}
