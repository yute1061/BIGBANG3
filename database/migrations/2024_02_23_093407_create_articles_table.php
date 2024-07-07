<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail_path')->nullable();
            $table->string('tag');            
            $table->string('title');
            $table->string('body1');
            $table->string('image_path1')->nullable();
            $table->string('body2')->nullable();
            $table->string('image_path2')->nullable();
            $table->string('body3')->nullable();
            $table->string('image_path3')->nullable();
            $table->string('body4')->nullable();
            $table->string('image_path4')->nullable();
            $table->string('body5')->nullable();
            $table->string('image_path5')->nullable();
            $table->string('body6')->nullable();
            $table->string('image_path6')->nullable();
            $table->string('body7')->nullable();
            $table->string('image_path7')->nullable();
            $table->string('body8')->nullable();
            $table->string('image_path8')->nullable();
            $table->string('body9')->nullable();
            $table->string('image_path9')->nullable();
            $table->string('body10')->nullable();
            $table->string('image_path10')->nullable();
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
        Schema::dropIfExists('article');
    }
};
