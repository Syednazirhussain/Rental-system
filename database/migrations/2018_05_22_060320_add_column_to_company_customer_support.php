<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCompanyCustomerSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_support', function (Blueprint $table) {
            $table->string('last_comment',191)->nullable();
            $table->string('company_name',191)->nullable();
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
            $table->dropColumn('last_comment');
            $table->dropColumn('company_name');
        });
    }
}
