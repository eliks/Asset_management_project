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
<<<<<<< HEAD
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
             $table->softDeletes();
=======
            $table->increments('id')->nullable();
            $table->string('username', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('password', 64)->nullable();
            $table->integer('type_id', 64)->nullable()->unsigned()->index();
            $table->integer('added_by_id', 64)->nullable()->unsigned()->index();
           
>>>>>>> e692d2facffda697e8cb72ec65d90df3824afa8b
            $table->timestamps();
            $table->softDeletes();
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
