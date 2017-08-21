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
            $table->string('role');
            $table->boolean('active');
            // the provider will have users to accept services or refuse it depends on the requests made by Beneficiaries 
            $table->integer('provider_id')->nullable()->unsigned()->index();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            // the contractor will have users to add Beneficiaries or disable or delete them
            $table->integer('contractor_id')->nullable()->unsigned()->index();
            $table->foreign('contractor_id')->references('id')->on('contractors')->onDelete('cascade');
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
