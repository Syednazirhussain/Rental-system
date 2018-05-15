<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCompanyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support', function (Blueprint $table) {
            $table->foreign('company_id', 'support_ibfk_5')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support', function (Blueprint $table) {
            $table->dropForeign('support_ibfk_5');
        });
    }
}
