<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('company_contract_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('contract_number');
            $table->string('content');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('company_contract_id')->references('id')->on('company_contracts');
            $table->foreign('customer_id')->references('id')->on('users');
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
            $table->dropForeign('room_contracts_room_id_foreign');
            $table->dropForeign('room_contracts_company_id_foreign');
            $table->dropForeign('room_contracts_company_contract_id_foreign');
            $table->dropForeign('room_contracts_customer_id_foreign');
        });

        Schema::dropIfExists('room_contracts');
    }
}
