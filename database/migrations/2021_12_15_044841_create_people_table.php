<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nic')->unique()->nullable();
            $table->string('gender');
            $table->unsignedBigInteger('household')->references('id')->on('households');
            $table->string('gn_division')->references('code')->on('gn_divisions');
            $table->string('village')->references('name')->on('villages');
            $table->string('vote_list_serial')->nullable();
            $table->string('status')->default('Alive')->nullable();

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
        Schema::dropIfExists('people');
    }
}
