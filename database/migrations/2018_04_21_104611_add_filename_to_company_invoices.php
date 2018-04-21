<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilenameToCompanyInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_invoices', function (Blueprint $table) {
            $table->string('payment_cycle',191)->nullable();
            $table->string('file_name',191)->nullable();
            $table->string('status',191)->default('unpaid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_invoices', function (Blueprint $table) {
            $table->dropColumn(['payment_cycle','file_name','status']);
        });
    }
}
