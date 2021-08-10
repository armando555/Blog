<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTablaPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->unsignedBigInteger('userId');
            $table->foreign('userId', 'fk_post_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
            $table->string('slug',150)->unique();
            $table->string('description',255);
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('posts');
    }
}
