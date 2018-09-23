<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones_contact_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contactinfo_id')->nullable()->unsigned();
            $table->foreign('contactinfo_id')->references('id')->on('contactus_settings')->onDelete('cascade');
            $table->string('phone')->default('');
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
        Schema::dropIfExists('phones_contact_info');
    }
}
