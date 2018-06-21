<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToHrEmploymentForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hr_employment_form', function (Blueprint $table) {
            $table->integer('company_id')->unsigned()->nullable()->index('company_id');
            $table->foreign('company_id', 'hr_employment_form_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hr_employment_form', function (Blueprint $table) {
            $table->dropForeign('hr_employment_form_ibfk_1');
            $table->dropColumn('company_id');
        });
    }
}
