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
            $table->integer('company_id')->unsigned()->nullable()->index('company_id');
            $table->integer('room_id')->unsigned()->index('room_id');
            $table->string('number', 100)->nullable();
            $table->text('content', 65535)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('termindation_date')->nullable();
            $table->string('payment_method', 50)->nullable()->index('payment_method');
            $table->integer('payment_cycle')->unsigned()->index('payment_cycle');;
            $table->decimal('discount', 10)->unsigned()->default(0.00);
            $table->string('discount_type', 50)->nullable();
            $table->string('status', 50)->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('payment_cycle')->references('id')->on('payment_cycles');
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
            $table->dropForeign('room_contracts_payment_cycle_foreign');
        });

        Schema::dropIfExists('room_contracts');
    }
}
