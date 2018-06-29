<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('survey_id')->unsigned()->index('survey_id');
            $table->integer('customer_id')->unsigned()->index('customer_id');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('survey_id')->references('id')->on('company_surveys');
            $table->foreign('customer_id')->references('id')->on('company_customers');

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
        Schema::dropIfExists('customer_feedbacks');

        Schema::table('survey_answers', function (Blueprint $table) {
            $table->dropForeign('customer_feedbacks_company_id_foreign');
            $table->dropForeign('customer_feedbacks_survey_id_foreign');
            $table->dropForeign('customer_feedbacks_customer_id_foreign');
        });
    }
}
