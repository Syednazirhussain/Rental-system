<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_financials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acc_1');
            $table->string('acc_2');
            $table->string('acc_3');
            $table->string('acc_4');
            $table->integer('article_no');
            $table->integer('cost_no');
            $table->integer('project_no');

            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('article_id')->unsigned()->index('article_id');


            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('article_id')->references('id')->on('company_articles');

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
        Schema::dropIfExists('article_financials');

        Schema::table('article_financials', function (Blueprint $table) {
            $table->dropForeign('article_financials_company_id_foreign');
            $table->dropForeign('article_financials_article_id_foreign');
        });
    }
}
