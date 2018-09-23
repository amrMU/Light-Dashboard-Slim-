<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactWhatsappNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_whatsapp_number', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contactinfo_id')->nullable()->unsigned();
            $table->foreign('contactinfo_id')->references('id')->on('contactus_settings')->onDelete('cascade');
            $table->string('whatsapp')->default('');
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
        Schema::dropIfExists('contact_whatsapp_number');
    }
}
