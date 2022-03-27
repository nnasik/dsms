<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_hold_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->references('id')->on('house_holds');
            $table->string('type')->nullable();
            $table->string('electricity')->default('CEB')->nullable();
            $table->string('water')->default('Well')->nullable();
            $table->string('toilet')->default('Yes')->nullable();
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
        Schema::dropIfExists('house_hold_details');
    }
}
