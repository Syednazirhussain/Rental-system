<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->float('new_in_price', 10, 0)->default(0);
            $table->date('new_from');
            $table->date('new_until');
            $table->boolean('new_continues')->default(true);
            $table->float('sales_price', 10, 0)->default(0);
            $table->date('sales_from');
            $table->date('sales_until');
            $table->boolean('sales_continues')->default(true);
            $table->string('note_internal_use')->nullable();
            $table->string('note_customers_swedish')->nullable();
            $table->string('note_customers_english')->nullable();

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
        Schema::dropIfExists('article_prices');

        Schema::table('article_prices', function (Blueprint $table) {
            $table->dropForeign('article_prices_company_id_foreign');
            $table->dropForeign('article_prices_article_id_foreign');
        });
    }
}
