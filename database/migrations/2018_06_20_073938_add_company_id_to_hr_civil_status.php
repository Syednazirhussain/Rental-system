<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToHrCivilStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hr_civil_status', function (Blueprint $table) {
            $table->integer('company_id')->unsigned()->nullable()->index('company_id');
            $table->foreign('company_id', 'hr_civil_status_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_civil_status', function (Blueprint $table) {
            $table->dropForeign('hr_civil_status_ibfk_1');
            $table->dropColumn('company_id');
        });
    }
}
