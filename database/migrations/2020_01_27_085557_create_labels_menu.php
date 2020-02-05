<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelsMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->bigInteger('labels_id')->unsigned(); 
            $table->foreign('labels_id')
            ->references('id')
             ->on('labels')
            ->onDelete('cascade');
            $table->String('labels_title');
            $table->integer('labels_menu_id');
            $table->String('labels_menu_title');
            $table->String('labels_menu_description');
            $table->String('labels_menu_url');
            $table->String('labels_menu_img');
            $table->String('labels_menu_slug');
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
        Schema::dropIfExists('labels_menu');
    }
}
