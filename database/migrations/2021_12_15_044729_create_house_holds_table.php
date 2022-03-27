<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_holds', function (Blueprint $table) {
            $table->id();
            $table->string('house_hold_no')->unique();
            $table->string('gn_division')->references('id')->on('gn_divisions');
            $table->string('village')->references('id')->on('villages');
            $table->unsignedBigInteger('road')->references('name')->on('roads');
            $table->string('location')->nullable();
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
        Schema::dropIfExists('house_holds');
    }
}
