<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('last_name')->default('');
            $table->string('email')->default('')->unique();
            $table->string('password');
            $table->string('lat_location')->default('');
            $table->string('long_location')->default('');
            $table->string('phone')->default('');
            $table->string('city')->default('');
            $table->string('time_work')->default('');
            $table->enum('gander',['male','female']);
            $table->enum('type_user',['user','admin','stores']);
            $table->integer('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('address')->default('');
            $table->enum('status',['active','deactive','suspended']);
            $table->string('suspended_reason')->default('');
            $table->string('deactive_reason')->default('');
            $table->string('image')->default('img/avatar.png');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
