<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomContractIdToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function($table){
            $table->integer('room_contract_id')->unsigned()->nullable()->index('room_contract_id');

            $table->foreign('room_contract_id')->references('id')->on('room_contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_contracts', function (Blueprint $table) {
            $table->dropForeign('companies_room_contract_id_foreign');
        });
    }
}
