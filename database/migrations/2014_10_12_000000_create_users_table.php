<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('id')->primary();
            $table->string('password');
            $table->string('designation');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('status')->nullable();

            $table->string('profile_pic')->nullable();
            $table->string('sign')->nullable();

            $table->boolean('require_advance_program')->nullable();
            $table->boolean('require_attendance')->nullable();

            $table->time('arrival')->nullable();
            $table->time('departure')->nullable();
            $table->time('work_time')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
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
