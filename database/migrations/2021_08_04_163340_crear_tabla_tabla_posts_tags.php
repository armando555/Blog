<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTablaPostsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postsId');
            $table->foreign('postsId','fk_posttag_post')->references('id')->on('posts')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('tagsId');
            $table->foreign('tagsId','fk_posttag_tags')->references('id')->on('tags')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('posts_tags');
    }
}
