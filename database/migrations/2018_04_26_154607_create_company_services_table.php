<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned()->nullable()->index('room_id');
            $table->integer('service_id')->unsigned()->nullable()->index('service_id');
            $table->decimal('price', 10)->unsigned()->nullable();
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
        Schema::dropIfExists('company_services');
    }
}
