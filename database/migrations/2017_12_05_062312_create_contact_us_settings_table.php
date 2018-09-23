<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsSettingsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus_settings', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('site_name')->default('');
            $table->string('description_ar')->default('');
            $table->string('description_en')->default('');
            $table->string('email')->default('');
            $table->string('meta_tags')->default('');//meta_tags
            // $table->string('phone')->default('');
            $table->string('lat')->default('');
            $table->string('long')->default('');
            $table->string('address')->default('');//address

            $table->string('logo')->default('');
            $table->string('fburl')->default('');
            $table->string('twitter_url')->default('');
            $table->string('google_url')->default('');
            $table->string('instgram_url')->default('');
            $table->string('youtube_url')->default('');
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
        Schema::drop('contactus_settings');
    }
}
