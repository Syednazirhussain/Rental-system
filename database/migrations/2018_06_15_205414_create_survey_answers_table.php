<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->string('answer_type');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('survey_id')->unsigned()->index('survey_id');
            $table->integer('user_id')->unsigned()->index('user_id');
            $table->integer('question_id')->unsigned()->index('question_id');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('survey_id')->references('id')->on('company_surveys');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('question_id')->references('id')->on('survey_questions');

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
        Schema::dropIfExists('survey_answers');

        Schema::table('survey_answers', function (Blueprint $table) {
            $table->dropForeign('survey_answers_company_id_foreign');
            $table->dropForeign('survey_answers_survey_id_foreign');
            $table->dropForeign('survey_answers_user_id_foreign');
            $table->dropForeign('survey_answers_question_id_foreign');
        });
    }
}
