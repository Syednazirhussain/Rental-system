<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAgentToSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support', function (Blueprint $table) {
            $table->integer('agent')->unsigned()->nullable()->index('agent');
            $table->foreign('agent', 'support_ibfk_5')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support', function (Blueprint $table) {
            $table->dropForeign('support_ibfk_5');
            $table->dropColumn('agent');
        });
    }
}
