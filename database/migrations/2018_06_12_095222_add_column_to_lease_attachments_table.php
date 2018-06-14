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
            $table->integer('lease_attachment_id')->unsigned()->nullable()->index('lease_attachment_id');
            $table->foreign('lease_partner_id', 'lease_attachment_ibfk_1')->references('id')->on('lease_partner')->onUpdate('CASCADE')->onDelete('CASCADE');
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
            $table->dropForeign('lease_attachment_ibfk_1');
            $table->dropColumn('lease_attachment');
        });
    }
}
