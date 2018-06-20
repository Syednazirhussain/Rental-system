<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAgentToCompanySupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_support', function (Blueprint $table) {
            $table->integer('agent')->unsigned()->nullable()->index('agent');
            $table->foreign('agent', 'company_support_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_support', function (Blueprint $table) {
            $table->dropForeign('company_support_ibfk_1');
            $table->dropColumn('agent');
        });
    }
}
