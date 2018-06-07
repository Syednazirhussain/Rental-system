<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysAgainToCompanySupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_support', function(Blueprint $table)
        {
            $table->foreign('category_id', 'category_id')->references('id')->on('company_support_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('priority_id', 'priority_id')->references('id')->on('company_support_priorities')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('status_id', 'status_id')->references('id')->on('company_support_status')->onUpdate('CASCADE')->onDelete('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_support', function(Blueprint $table)
        {
            $table->dropForeign('category_id');
            $table->dropForeign('priority_id');
            $table->dropForeign('status_id');

        });
    }
}
