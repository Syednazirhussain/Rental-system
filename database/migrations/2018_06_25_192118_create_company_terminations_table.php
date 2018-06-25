<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTerminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_terminations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('termination_date');
            $table->string('termination_issue');
            $table->date('contract_end_date');
            $table->date('immigrant_date');
            $table->date('room_can_rented_date');
            $table->string('note');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('contract_id')->unsigned()->index('contract_id');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('contract_id')->references('id')->on('room_contracts');

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
        Schema::dropIfExists('company_terminations');

        Schema::table('company_terminations', function (Blueprint $table) {
            $table->dropForeign('company_terminations_company_id_foreign');
            $table->dropForeign('company_terminations_contract_id_foreign');
        });
    }
}
