<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomegalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homegallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_title');
            $table->string('image_name');
            $table->string('image_description');
            $table->string('image_url');
            $table->string('gallery_image');
            $table->string('image_sub_name');
            $table->string('image_sub_url');
            $table->string('gallery_sub_img');
            $table->string('image_slag');
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
        Schema::dropIfExists('homegallery');
    }
}
