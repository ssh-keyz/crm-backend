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

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->string('title');

            $table->unsignedInteger('project_status_id');
            $table->foreign('project_status_id')->references('id')->on('project_statuses');

            $table->unsignedInteger('project_milestone_id');
            $table->foreign('project_milestone_id')->references('id')->on('project_milestones');

            $table->unsignedInteger('project_milestone_step_id');
            $table->foreign('project_milestone_step_id')->references('id')->on('project_milestone_steps');

            $table->string('product')->nullable();

            $table->string('motion_type')->nullable();

            $table->string('handing')->nullable();

            $table->string('opener')->nullable();

            $table->string('species')->nullable();

            $table->string('finish_type')->nullable();

            $table->string('glass_selection')->nullable();

            $table->string('weather_stripping')->nullable();

            $table->string('color')->nullable();

            $table->boolean('install_required')->nullable();

            $table->boolean('shipping_required')->nullable();

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
        Schema::dropIfExists('projects');
    }
}
