<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_provider_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('request_user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('requestUserName');
            $table->string('conversation_id')->constrained('conversations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('body');
            $table->string('new')->default('1');
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
        Schema::dropIfExists('requests');
    }
}
