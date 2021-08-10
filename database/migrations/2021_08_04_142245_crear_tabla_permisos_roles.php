<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPermisosRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('roleId');
            $table->foreign('roleId', 'fk_role_Id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('licensesId');
            $table->foreign('licensesId', 'fk_licenses_Id')->references('id')->on('licenses')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses_roles');
    }
}
