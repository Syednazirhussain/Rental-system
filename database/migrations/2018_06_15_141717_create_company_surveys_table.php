<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('survey');
            $table->string('status');
            $table->string('category_code');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('company_surveys');

        Schema::table('company_surveys', function (Blueprint $table) {
            $table->dropForeign('company_surveys_company_id_foreign');
        });
    }
}
