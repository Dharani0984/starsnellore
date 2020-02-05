<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateServiceSubmenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_submenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('menu_id')->unsigned(); 
            $table->foreign('menu_id')
            ->references('id')
             ->on('service_menus')
            ->onDelete('cascade');
            $table->String('menu_name');
            $table->String('submenu_id');
            $table->String('submenu_title');
            $table->String('submenu_name');
            $table->Integer('submenu_price');
            $table->String('submenu_description');
            $table->String('submenu_url');
            $table->String('submenu_img');
            $table->String('submenu_slug');
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
        Schema::dropIfExists('service_submenus');
    }
}
