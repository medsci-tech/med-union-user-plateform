<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSourceToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('source')->nullable()->after('phone')->comment('用户来源，一般为接口标记');
            $table->string('remark')->nullable()->after('source')->comment('创建者给用户的标记，一般为接口调用者提供');
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->string('extra')->nullable()->after('hospital_name')->comment('创建者提供的额外用户信息，一般为json字符串');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn(['source', 'remark']);
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['extra']);
        });
    }
}
