<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('invoice_delivery');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->integer('company_id')->unsigned()->index('company_id');
            $table->integer('customer_id')->unsigned()->index('customer_id');
            $table->string('email_invoicing');
            $table->string('payment_condition')->nullable();
            $table->boolean('interest_invoice')->default(false);
            $table->boolean('reminder')->default(false);
            $table->boolean('inkasso')->default(false);
            $table->string('cost_number');
            $table->string('sale_discount');
            $table->string('reference_person');
            $table->string('interest_rate')->nullable();
            $table->string('free_text_1')->nullable();
            $table->string('free_text_2')->nullable();
            $table->string('free_text_3')->nullable();
            $table->string('language')->nullable();
            $table->string('note')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('company_customers');

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
        Schema::dropIfExists('customer_invoices');

        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropForeign('customer_invoices_company_id_foreign');
            $table->dropForeign('customer_invoices_customer_id_foreign');
        });
    }
}
