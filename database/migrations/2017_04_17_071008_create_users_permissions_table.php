<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('type_user')->unsigned();
            $table->enum('permissions', ['disabled', 'enabled']);
            $table->enum('insert_recources', ['disabled', 'enabled']);
            $table->enum('insert_tags', ['disabled', 'enabled']);
            $table->enum('insert_users', ['disabled', 'enabled']);
            $table->enum('insert_reservations', ['disabled', 'enabled']);
            $table->enum('delete_resources', ['disabled', 'enabled']);
            $table->enum('delete_tags', ['disabled', 'enabled']);
            $table->enum('delete_users', ['disabled', 'enabled']);
            $table->enum('delete_reservations', ['disabled', 'enabled']);
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
        Schema::dropIfExists('users_permissions');
    }
}
