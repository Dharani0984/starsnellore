<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateServiceMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_id')->unsigned(); 
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->String('service_name');
            $table->String('menu_id');
            $table->String('menu_title');
            $table->String('menu_name');
            $table->String('menu_description');
            $table->String('menu_url');
            $table->String('menu_img');
            $table->String('menu_slug');
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
       Schema::dropIfExists('service_menus');
    }
}
