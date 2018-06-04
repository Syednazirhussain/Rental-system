<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module');
            $table->integer('number');
            $table->string('article_name_swedish');
            $table->string('article_name_english');
            $table->float('sales_price', 10, 0)->nullable();
            $table->float('in_price', 10, 0)->nullable();
            $table->integer('unit');
            $table->string('suppliers');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('category');
            $table->string('shortcut')->nullable();
            $table->float('vat', 10, 0)->nullable();
            $table->integer('rank_index');
            $table->integer('sort_index');
            $table->string('cancellation_condition')->default(false);
            $table->boolean('commission_article')->default(false);
            $table->boolean('show_in_booking')->default(false);
            $table->boolean('show_in_cache')->default(false);
            $table->boolean('show_in_online_booking')->default(false);
            $table->boolean('continues')->default(false);
            $table->boolean('bonus_article')->default(false);
            $table->boolean('main_article')->default(true);


            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('building')->unsigned()->index('building');
            $table->integer('package')->unsigned()->nullable()->index('package');


            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('building')->references('id')->on('company_buildings');
            $table->foreign('package')->references('id')->on('company_articles');

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
        Schema::dropIfExists('company_articles');

        Schema::table('company_articles', function (Blueprint $table) {
            $table->dropForeign('company_customers_company_id_foreign');
            $table->dropForeign('company_customers_building_foreign');
            $table->dropForeign('company_articles_package_foreign');
        });
    }
}
