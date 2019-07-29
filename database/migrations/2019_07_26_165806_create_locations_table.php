<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name',64)->nullable();
              $table->string('tag',64)->nullable();
               $table->string('brand',64)->nullable();
                $table->integer('organization_id')->unsigned()->index()->nullable();
                $table->integer('parent_id')->unsigned()->index()->nullable();
                $table->string('address',64)->nullable();
                $table->integer('added_by_id')->unsigned()->index()->nullable();
                $table->softDeletes();

            $table->timestamp('created_at')->default(date('y-m-d H:i:s',strtotime('now')));

            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
