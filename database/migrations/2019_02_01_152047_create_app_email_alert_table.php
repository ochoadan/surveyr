<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppEmailAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_email_alert', function (Blueprint $table) {
            $table->unsignedInteger('app_id');
            $table->unsignedInteger('email_alert_id');

            $table->index(['app_id', 'email_alert_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_email_alert');
    }
}
