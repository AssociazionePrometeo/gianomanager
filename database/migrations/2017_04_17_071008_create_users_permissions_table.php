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
            $table->enum('permissions', ['0', '1']);
            $table->enum('insert_recources', ['0', '1']);
            $table->enum('insert_tags', ['0', '1']);
            $table->enum('insert_users', ['0', '1']);
            $table->enum('insert_reservations', ['0', '1']);
            $table->enum('delete_resources', ['0', '1']);
            $table->enum('delete_tags', ['0', '1']);
            $table->enum('delete_users', ['0', '1']);
            $table->enum('delete_reservations', ['0', '1']);
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
