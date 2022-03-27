<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceProgramCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_program_calendar', function (Blueprint $table) {
            $table->date('date');
            $table->unsignedBigInteger('advance_program_id');
            $table->string('user_id');
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->mediumText('nature_of_work')->nullable();
            $table->string('working_place')->nullable();
            $table->string('beneficiaries')->nullable();
            $table->string('field_no')->nullable();
            $table->string('target')->nullable();
            $table->string('km')->nullable();

            // Meta
            $table->string('note')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->timestamp('checked_on')->nullable();
            $table->string('checked_by')->nullable();
        });

        Schema::table('advance_program_calendar', function (Blueprint $table) {
            $table->primary(['date','advance_program_id']);
            $table->unique(['date','user_id']);
            $table->foreign('date')->references('date')->on('calendars');
            $table->foreign('advance_program_id')->references('id')->on('advance_programs');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('checked_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advance_program_calendar');
    }
}
