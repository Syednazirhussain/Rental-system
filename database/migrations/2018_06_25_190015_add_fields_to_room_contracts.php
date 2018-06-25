<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToRoomContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_contracts', function($table){
            $table->integer('nr_termination');
            $table->integer('nr_landlord');
            $table->string('monthly_rent');
            $table->string('note');

            $table->integer('customer_id')->unsigned()->index('customer_id');
            $table->foreign('customer_id')->references('id')->on('company_customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_contracts', function($table) {
            $table->dropColumn('content');
            $table->dropColumn('discount_type');
        });
    }
}
