<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCompanyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_services', function(Blueprint $table)
        {
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_services', function(Blueprint $table)
        {
            $table->dropForeign('company_services_room_id_foreign');
            $table->dropForeign('company_services_service_id_foreign');
        });

    }
}
