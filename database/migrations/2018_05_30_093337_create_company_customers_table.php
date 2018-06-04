<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('org_no');
            $table->string('name');
            $table->string('printer_code');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('building')->unsigned()->index('building');
            $table->integer('floor')->unsigned()->index('floor');
            $table->integer('room')->unsigned()->index('room');
            $table->string('category');
            $table->string('email');
            $table->string('attachment')->nullable();
            $table->string('tel_number');
            $table->integer('qty_meeting_room');
            $table->string('mobile');
            $table->boolean('block_customer')->default(false);
            $table->string('language')->nullable();
            $table->string('blocked_by')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('building')->references('id')->on('company_buildings');
            $table->foreign('floor')->references('id')->on('company_floor_rooms');
            $table->foreign('room')->references('id')->on('rooms');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_customers', function (Blueprint $table) {
            $table->dropForeign('company_customers_company_id_foreign');
            $table->dropForeign('company_customers_building_foreign');
            $table->dropForeign('company_customers_floor_foreign');
            $table->dropForeign('company_customers_room_foreign');
        });

        Schema::dropIfExists('company_customers');
    }
}
