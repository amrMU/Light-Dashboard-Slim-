<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /*
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('slider', function (Blueprint $table)
       {
           $table->increments('id');
           $table->string('title_ar')->default('');
           $table->string('title_en')->default('');
           $table->string('content_ar')->default('');
           $table->string('content_en')->default('');
           $table->string('price')->default('');
           $table->string('url')->default('');
           $table->string('image')->default('');
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
      Schema::drop('slider');
   }
}
