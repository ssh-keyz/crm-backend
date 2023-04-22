<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectMilestoneStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_milestone_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unsignedInteger('project_milestone_id');
            $table->foreign('project_milestone_id')->references('id')->on('project_milestones');

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
        Schema::dropIfExists('project_milestone_steps');
    }
}
