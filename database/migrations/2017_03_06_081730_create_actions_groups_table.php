<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actions_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();

            $table->foreign('actions_id')->references('id')->on('actions');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions_groups');
    }
}
