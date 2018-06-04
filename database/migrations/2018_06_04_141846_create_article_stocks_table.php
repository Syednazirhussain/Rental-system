<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->integer('value');
            $table->float('width', 10, 0);
            $table->float('height', 10, 0);
            $table->integer('depth');
            $table->float('weight', 10, 0);

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
        Schema::dropIfExists('article_stocks');

        Schema::table('article_stocks', function (Blueprint $table) {
            $table->dropForeign('article_stocks_company_id_foreign');
            $table->dropForeign('article_stocks_article_id_foreign');
        });
    }
}
