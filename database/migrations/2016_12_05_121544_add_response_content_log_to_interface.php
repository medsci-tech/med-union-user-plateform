<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResponseContentLogToInterface extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interface_logs', function(Blueprint $table) {
            $table->text('response_content')->comment('返回内容')->after('request_content');
            $table->string('response_http_status_code')->comment('返回http status code')->after('response_content');
            $table->dropColumn('succeed');
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
            $table->dropColumn(['response_content', 'response_http_status_code']);
            $table->boolean('succeed')->default(0)->after('request_content')->comment('接口调用成功标识，初始是0，调用结束返回时置1');
        });
    }
}
