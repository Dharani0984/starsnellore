<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeslider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeslider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('slider_title');
            $table->String('slider_name');
            $table->String('slider_description');
            $table->String('slider_url');
            $table->String('slider_img');
            $table->String('slider_slug');
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
        Schema::dropIfExists('homeslider');
    }
}
