<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('place');
            $table->text('meeting_purpose');
            $table->timestamp('date_time');
            $table->string('note')->nullable();
            $table->enum('author_response', ['Accept', 'Decline', 'Waiting'])->default('Waiting')->nullable();
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function(Blueprint $table)
        {
            $table->dropForeign('schedules_user_id_foreign');
        });

        Schema::dropIfExists('schedules');
    }
}
