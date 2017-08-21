<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_locations', function (Blueprint $table) {
            $table->increments('id');
            // providers will have more than location and phone number
            $table->mediumInteger('provider_id')->nullable()->unsigned()->index();
            $table->foregin('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->string('name');
            $table->string('mobile', 11);
            $table->string('phone', 11);
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
        Schema::dropIfExists('provider_locations');
    }
}
