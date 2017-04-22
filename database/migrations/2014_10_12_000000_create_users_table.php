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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('info')->nullable();
            $table->integer('user_level')->default(3);
            $table->string('mobile_number')->nullable();
            $table->dateTime('signup_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('expiration_date')->nullable();;
            $table->dateTime('last_login')->nullable();;
            $table->enum('active', ['enabled', 'disabled'])->default('disabled');
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
