<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStripeStatusToSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('stripe_status')->nullable();
        });

        Schema::table('team_subscriptions', function (Blueprint $table) {
            $table->string('stripe_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('stripe_status');
        });

        Schema::table('team_subscriptions', function (Blueprint $table) {
            $table->dropColumn('stripe_status');
        });
    }
}
