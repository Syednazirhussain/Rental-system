<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEntityIDColumnIntoConferenceBookingItemsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conference_booking_items', function (Blueprint $table) {
            $table->integer('entity_id')->unsigned()->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conference_booking_items', function (Blueprint $table) {
            $table->dropColumn('entity_id');
        });
    }
}
