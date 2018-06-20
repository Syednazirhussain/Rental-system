<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBuildingIdToRoomEquipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_equipments', function (Blueprint $table) {
            $table->integer('building_id')->unsigned()->nullable()->index('building_id');
            $table->foreign('building_id', 'room_equipments_ibfk_3')->references('id')->on('company_buildings')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_equipments', function (Blueprint $table) {
            $table->dropForeign('room_equipments_ibfk_3');
            $table->dropColumn('building_id');
        });
    }
}
