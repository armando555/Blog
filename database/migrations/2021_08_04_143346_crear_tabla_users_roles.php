<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsersRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('roleId');
            $table->foreign('roleId', 'fk_roleId')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId', 'fk_userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
