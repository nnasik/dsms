<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_details', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id');

            $table->mediumText('full_name_t')->nullable();
            $table->mediumText('full_name_s')->nullable();

            $table->string('name_with_initials')->nullable();
            $table->date('dob')->nullable();

            $table->string('maritial_status')->nullable();
            $table->string('maritial_status_reason')->nullable();

            $table->string('driving_license')->unique()->nullable();
            $table->string('passport')->unique()->nullable();

            $table->string('ethnicity')->nullable();
            $table->string('religion')->nullable();

            $table->string('education_level')->nullable();
            $table->string('computer_literacy')->nullable();

            $table->string('mobile_no')->nullable();
            $table->string('land_phone_no')->nullable();
            $table->string('email')->nullable();

            $table->boolean('is_head_of_family')->nullable()->default(false);
            $table->integer('vote_list_serial')->nullable();
            $table->string('residence_status')->nullable();



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
        Schema::dropIfExists('person_details');
    }
}
