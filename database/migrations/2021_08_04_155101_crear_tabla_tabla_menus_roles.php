<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTablaMenusRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('roleId');
            $table->foreign('roleId', 'fk_role__Id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('menusId');
            $table->foreign('menusId', 'fk_menus__Id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_roles');
    }
}
