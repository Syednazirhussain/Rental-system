<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('floor_id')->unsigned();
            $table->integer('service_id')->unsigned()->nullable()->index('service_id');
            $table->string('name');
            $table->integer('area');
            $table->integer('price');
            $table->string('security_code');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('image5');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('floor_id')->references('id')->on('company_floor_rooms');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_floor_id_foreign');
            $table->dropForeign('rooms_service_id_foreign');
        });
        Schema::dropIfExists('rooms');
    }
}
