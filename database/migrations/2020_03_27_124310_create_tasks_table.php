<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->bigInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id')->references('id')->on('users');
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
