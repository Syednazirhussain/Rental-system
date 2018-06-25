<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIsMultiUnitsInCompanyArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_articles', function (Blueprint $table) {
            $table->dropColumn('is_multi_units');
            $table->tinyInteger('is_multi_units', 1)->unsigned()->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_articles', function (Blueprint $table) {
            $table->dropColumn('is_multi_units');
        });
    }
}
