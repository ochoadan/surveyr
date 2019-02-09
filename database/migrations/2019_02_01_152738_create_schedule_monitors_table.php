<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('app_id')->index();
            $table->string('slug')->unique();
            $table->string('name')->nullable();
            $table->string('command');
            $table->string('status')->default('passing')->index(); // passing/failing/paused
            $table->string('schedule');
            $table->string('timezone')->default('UTC');
            $table->integer('grace_period')->default(3);
            $table->timestamp('last_run_at')->nullable();
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
        Schema::dropIfExists('schedule_monitors');
    }
}
