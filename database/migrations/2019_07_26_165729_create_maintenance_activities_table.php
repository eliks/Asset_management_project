<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->unsigned()->index()->nullable();
            $table->datetime('maintained_at')->nullable();
            $table->string('maintained_by',64)->nullable();
            $table->string('supervised_by',64)->nullable();
            $table->string('description',64)->nullable();
            $table->double('cost')->nullable();
            $table->string('comment',64)->nullable();
            $table->string('location',64)->nullable();
            $table->integer('added_by_id')->unsigned()->index()->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->default(date('y-m-d H:i:s', strtotime('now')));
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
        Schema::dropIfExists('maintenance_activities');
    }
}
