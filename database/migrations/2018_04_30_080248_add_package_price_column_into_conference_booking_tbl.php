<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPackagePriceColumnIntoConferenceBookingTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conference_bookings', function (Blueprint $table) {

            $table->decimal('package_price', 10, 2)->unsigned()->default(0.00)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conference_bookings', function (Blueprint $table) {
            $table->dropColumn('package_price');
        });
    }
}
