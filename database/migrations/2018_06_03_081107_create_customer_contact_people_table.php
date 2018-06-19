<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_contact_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position_title');
            $table->string('tel_number');
            $table->string('mobile');
            $table->string('email');
            $table->integer('cost_no')->nullable();
            $table->integer('purchase_order')->nullable();
            $table->string('order_status')->nullable();
            $table->string('login_code')->nullable();
            $table->string('busin_levage');
            $table->string('group');
            $table->string('note')->nullable();
            $table->integer('customer_id')->unsigned()->index('customer_id');
            $table->integer('company_id')->unsigned()->index('company_id');

            $table->foreign('customer_id')->references('id')->on('company_customers');
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('customer_contact_people');

        Schema::table('customer_contact_people', function (Blueprint $table) {
            $table->dropForeign('customer_contact_people_company_id_foreign');
            $table->dropForeign('customer_contact_people_customer_id_foreign');
        });
    }
}
