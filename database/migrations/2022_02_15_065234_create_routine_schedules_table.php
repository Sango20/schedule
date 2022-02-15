<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->string('title',50);
            $table->time('start_time');
            $table->integer('time');
            $table->string('contents',200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routine_schedules');
    }
}
