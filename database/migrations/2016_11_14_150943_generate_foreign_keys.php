<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GenerateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->foreign('enterprise_id')->references('id')->on('enterprises');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('application_id')->references('id')->on('applications');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects');
        });

        Schema::table('bean_rates', function (Blueprint $table) {
            $table->foreign('bean_rate_type_id')->references('id')->on('bean_rate_types');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign('applications_enterprise_id_foreign');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_application_id_foreign');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->dropForeign('contracts_project_id_foreign');
        });

        Schema::table('bean_rates', function (Blueprint $table) {
            $table->dropForeign('bean_rates_bean_rate_type_id_foreign');
            $table->dropForeign('bean_rates_project_id_foreign');
        });
    }
}
