<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('survey_id')->unsigned()->index('survey_id');
            $table->integer('question_id')->unsigned()->index('question_id');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('survey_id')->references('id')->on('company_surveys');
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
        Schema::dropIfExists('question_options');

        Schema::table('question_options', function (Blueprint $table) {
            $table->dropForeign('question_options_company_id_foreign');
            $table->dropForeign('question_options_survey_id_foreign');
            $table->dropForeign('question_options_question_id_foreign');
        });
    }
}
