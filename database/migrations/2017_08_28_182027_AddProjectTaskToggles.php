<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectTaskToggles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('color_required')->default(false);
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('money_required')->default(false);
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('service_call_required')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            Schema::table('projects', function ($table) {
                $table->dropColumn('color_required');
            });
            Schema::table('projects', function ($table) {
                $table->dropColumn('money_required');
            });
            Schema::table('projects', function ($table) {
                $table->dropColumn('service_call_required');
            });
        });
    }
}
