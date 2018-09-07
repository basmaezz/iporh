<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('post_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('type',[1,2,3]);
            $table->string('title');
            $table->text('description');
            $table->text('text');
            $table->string('title_en');
            $table->text('description_en');
            $table->text('text_en');
            $table->string('image');
            $table->string('video');
            $table->integer('views');
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
        Schema::dropIfExists('posts');
    }
}
