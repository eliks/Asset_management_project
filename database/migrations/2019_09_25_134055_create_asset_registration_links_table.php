<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetRegistrationLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_registration_links', function (Blueprint $table) {
            $table->increments('id');

            $table->string('caption',64)->nullable();
            $table->string('description',512)->nullable();
            $table->integer('type_id')->nullable()->unsigned()->index();
            $table->string('token',64)->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('asset_registration_links');
    }
}
