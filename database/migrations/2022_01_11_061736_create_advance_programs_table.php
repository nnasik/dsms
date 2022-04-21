<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_programs', function (Blueprint $table) {
            //required Fields
            $table->id();
            $table->string('user');
            $table->integer('month');
            $table->integer('year');

            // <Header Fileds>
            $table->boolean('show_from')->nullable();
            $table->string('from')->nullable();
            $table->string('from_align')->nullable();

            $table->boolean('show_to')->nullable();
            $table->string('to')->nullable();

            $table->boolean('show_through')->nullable();
            $table->string('through')->nullable();

            $table->boolean('show_form_no')->nullable();
            $table->string('form_no')->nullable();

            $table->boolean('show_logo')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_align')->nullable();

            $table->boolean('show_header_text')->nullable();
            $table->mediumText('header_text')->nullable();

            $table->boolean('show_heading')->nullable();
            $table->mediumText('heading')->nullable();

            $table->boolean('show_name_of_the_officer')->nullable();
            $table->string('name_of_the_officer')->nullable();

            $table->boolean('show_designation')->nullable();
            $table->string('designation')->nullable();

            $table->boolean('show_district')->nullable();
            $table->string('district')->nullable();

            $table->boolean('show_division')->nullable();
            $table->string('division')->nullable();

            $table->boolean('show_divisional_secretariat')->nullable();
            $table->string('divisional_secretariat')->nullable();
            //</Header Fields>

            // <Footer Fields>
            $table->boolean('show_footer_text')->nullable();
            $table->mediumText('footer_text')->nullable();

            $table->boolean('show_sign')->nullable();
            $table->mediumText('sign')->nullable();

            $table->boolean('show_copy_to')->nullable();
            $table->string('copy_to')->nullable();
            // </Footer Fields>

            // Checked
            $table->boolean('is_correct')->nullable();
            $table->string('checked_by')->nullable();
            $table->longText('checked_note')->nullable();
            $table->timestamp('checked_on')->nullable();

            // Recommend
            $table->boolean('show_recommended')->nullable();                # show/hide recommended/not recommended text
            $table->string('recommended')->nullable();                      # change the label of recommended/not recommended text
            $table->boolean('is_recommended')->nullable();                  # recommended/not recommended
            $table->longText('recommendation_note')->nullable();              # holds note from the recommedation officer
            $table->string('recommended_by')->nullable();                   # recommended person
            $table->timestamp('recommended_on')->nullable();                # recommended date & time

            // Approval
            $table->boolean('show_approval')->nullable();
            $table->string('approval')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->longText('approval_note')->nullable();
            $table->string('approved_by')->nullable();
            $table->timestamp('approved_on')->nullable();

            // Table Columns
            $table->boolean('show_col_date')->nullable();
            $table->boolean('show_col_day')->nullable();
            $table->boolean('show_col_time')->nullable();
            $table->boolean('show_col_nature_of_work')->nullable();
            $table->boolean('show_col_working_place')->nullable();
            $table->boolean('show_col_beneficiaries')->nullable();
            $table->boolean('show_col_field_no')->nullable();
            $table->boolean('show_col_target')->nullable();
            $table->boolean('show_col_km')->nullable();
            $table->string('col_date')->nullable();
            $table->string('col_day')->nullable();
            $table->string('col_time')->nullable();
            $table->string('col_nature_of_work')->nullable();
            $table->string('col_working_place')->nullable();
            $table->string('col_beneficiaries')->nullable();
            $table->string('col_field_no')->nullable();
            $table->string('col_target')->nullable();
            $table->string('col_km')->nullable();

            // Meta fields
            $table->string('header_format')->nullable();
            $table->string('footer_format')->nullable();
            $table->string('status');
            $table->datetime('submitted_on')->nullable();
            $table->timestamps();
        });

        Schema::table('advance_programs', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('checked_by')->references('id')->on('users');
            $table->foreign('recommended_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->unique(['user', 'month', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advance_programs');
    }
}
