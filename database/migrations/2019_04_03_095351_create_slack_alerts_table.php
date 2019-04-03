<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlackAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slack_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('team_id')->index();
            $table->string('incoming_webhook');
            $table->string('slack_team')->nullable();
            $table->string('slack_channel')->nullable();
            $table->timestamps();
        });

        Schema::create('app_slack_alert', function (Blueprint $table) {
            $table->unsignedInteger('app_id');
            $table->unsignedInteger('slack_alert_id');

            $table->index(['app_id', 'slack_alert_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slack_alerts');

        Schema::dropIfExists('app_slack_alert');
    }
}
