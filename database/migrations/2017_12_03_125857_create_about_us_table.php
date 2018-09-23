<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table)
        {
            $table->increments('id');   
            $table->string('image');   
            $table->longText('content_ar');   
            $table->longText('content_en');  
            $table->longText('mission_ar');  
            $table->longText('mission_en');  
            $table->longText('history_ar');  
            $table->longText('history_en');  
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
        Schema::drop('about_us');
    }
}
