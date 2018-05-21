<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignKeyContraintOnPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {

            $table->dropForeign(['role_id']);
            $table->foreign('role_id')->references('id')->on('user_roles')->onUpdate('CASCADE')->onDelete('CASCADE');

        });

        Schema::table('model_has_roles', function (Blueprint $table) {

            $table->dropForeign(['role_id']);
            $table->foreign('role_id')->references('id')->on('user_roles')->onUpdate('CASCADE')->onDelete('CASCADE');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_has_permissions', function (Blueprint $table){

            $table->dropForeign(['role_id']);
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');

        });

        Schema::table('model_has_roles', function (Blueprint $table){

            $table->dropForeign(['role_id']);
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }
}
