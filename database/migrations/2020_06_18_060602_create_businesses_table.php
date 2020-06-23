<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('floor')->nullable();
            $table->integer('house_cnt')->nullable();
            $table->string('note')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('code')->nullable();
            $table->integer('kind')->nullable();
            $table->string('contact')->nullable();
            $table->integer('area_id')->nullable();

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
        Schema::dropIfExists('businesses');
    }
}
