<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',64)->nullable();
            $table->integer('type_id')->nullable()->unsigned()->index();
            $table->date('next_maintenance_date')->nullable();
            $table->string('tag',64)->nullable();
            $table->string('brand',64)->nullable();
            $table->string('user_name',64)->nullable();
            $table->integer('parent_id')->nullable()->unsigned()->index();
            $table->integer('location_id')->nullable()->unsigned()->index();
            $table->date('date_commenced')->nullable();
            $table->date('date_disposed')->nullable();
            $table->date('date_acquired')->nullable();
            $table->integer('added_by_id')->nullable()->unsigned()->index();

            $table->softDeletes();
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
        Schema::dropIfExists('assets');
    }
}
