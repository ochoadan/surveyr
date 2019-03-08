<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateScheduleMonitorEventsTableIdentifier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_monitor_events', function (Blueprint $table) {
            $table->string('identifier')->nullable()->index()->after('schedule_monitor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_monitor_events', function (Blueprint $table) {
            $table->dropColumn('identifier');
        });
    }
}
