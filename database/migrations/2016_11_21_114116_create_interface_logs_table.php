<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfaceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token_id', 100);
            $table->string('request_method')->comment('请求方式，get or post');
            $table->string('request_url')->comment('请求地址');
            $table->text('request_content')->comment('请求内容');
            $table->boolean('succeed')->default(0)->comment('接口调用成功标识，初始是0，调用结束返回时置1');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('token_id')->references('id')->on('oauth_access_tokens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interface_logs', function(Blueprint $table) {
//            $table->dropForeign('interface_logs_token_id_foreign');
        });
        Schema::dropIfExists('interface_logs');
    }
}
