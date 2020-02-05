<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Services extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->bigInteger('module_id')->unsigned(); 
            $table->foreign('module_id')
            ->references('id')
             ->on('modules')
            ->onDelete('cascade');
            $table->String('module_name');
            $table->integer('service_id');
            $table->String('service_title');
            $table->String('service_name');
            $table->String('service_description');
            $table->String('service_url');
            $table->String('service_img');
            $table->String('service_slug');
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
        Schema::dropIfExists('services');
    }
}
