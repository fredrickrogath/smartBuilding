<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('avartar')->nullable();
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('gender');
            $table->string('region');
            $table->string('district');
            $table->string('street');
            $table->string('customer')->default('1');
            $table->string('archtecture')->default('0');
            $table->string('seller')->default('0');
            $table->string('houseBuilder')->default('0');
            $table->string('block')->default('0');
            $table->string('adminstrator')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
