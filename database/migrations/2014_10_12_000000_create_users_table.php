<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname'); 
            $table->string('lastname');  
            $table->string('email', 191)->unique();
            $table->string('phone_number')->unique(); // Added phone_number field
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); 
            $table->rememberToken();
            $table->unsignedBigInteger('prestashop_customer_id')->nullable(); 
            $table->integer('id_gender')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->boolean('optin')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
