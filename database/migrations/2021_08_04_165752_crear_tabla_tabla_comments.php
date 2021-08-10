<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTablaComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->foreign('userId', 'fk_comments_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('postsId');
            $table->foreign('postsId','fk_comments_post')->references('id')->on('posts')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('commentsId')->nullable();
            $table->foreign('commentsId','fk_comments_comment')->references('id')->on('comments')->onDelete('cascade')->onUpdate('restrict');
            $table->text('content');
            $table->boolean('estado')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
