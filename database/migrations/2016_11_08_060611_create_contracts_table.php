<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable();
            $table->string('name')->unique()->comments('合同名称');
            $table->string('name_en')->unique()->comments('合同名称英文');
            $table->string('serial')->unique()->comments('合同编号');
            $table->text('description')->comments('附加描述');
            $table->decimal('amount_of_money', 12, 2)->comments('合同总金额，人民币');
            $table->decimal('rate_of_beans')->comments('该合同中迈豆兑换比例');
            $table->bigInteger('amount_of_beans')->comments('计算后合同包含迈豆总额');
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
        Schema::dropIfExists('contracts');
    }
}
