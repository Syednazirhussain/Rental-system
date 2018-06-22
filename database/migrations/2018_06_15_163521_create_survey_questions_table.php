<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->string('status');
            $table->string('answer_type');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('survey_id')->unsigned()->index('survey_id');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('survey_id')->references('id')->on('company_surveys');

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
        Schema::dropIfExists('survey_questions');

        Schema::table('survey_questions', function (Blueprint $table) {
            $table->dropForeign('survey_questions_company_id_foreign');
            $table->dropForeign('survey_questions_survey_id_foreign');
        });
    }
}
