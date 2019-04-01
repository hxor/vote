<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->integer('regency_id')->unsigned();
            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->integer('village_id')->unsigned();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->integer('nominee_id')->unsigned();
            $table->foreign('nominee_id')->references('id')->on('nominees');
            $table->integer('point')->unsigned();
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
        Schema::dropIfExists('votes');
    }
}
