<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToLeaseAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lease_attachment', function (Blueprint $table) {
            $table->integer('lease_partner_id')->unsigned()->nullable()->index('lease_partner_id');
            $table->foreign('lease_partner_id', 'lease_partner_id')->references('id')->on('lease_partner')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lease_attachment', function (Blueprint $table) {
            $table->dropForeign('lease_partner_id');
            $table->dropColumn('lease_partner_id');
        });
    }
}
