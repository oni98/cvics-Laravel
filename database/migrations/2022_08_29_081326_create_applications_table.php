<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('birth_date');
            $table->string('passport');
            $table->string('passport_expire');
            $table->string('maritial_status');
            $table->string('nationality');
            $table->string('country_of_residence');
            $table->string('address');
            $table->string('ssc');
            $table->string('ssc_year');
            $table->string('ssc_institute')->nullable();
            $table->string('ssc_cgpa');
            $table->string('hsc');
            $table->string('hsc_year');
            $table->string('hsc_institute')->nullable();
            $table->string('hsc_cgpa');
            $table->string('bachelor')->nullable();
            $table->string('bachelor_year')->nullable();
            $table->string('bachelor_institute')->nullable();
            $table->string('bachelor_cgpa')->nullable();
            $table->string('master')->nullable();
            $table->string('master_year')->nullable();
            $table->string('master_institute')->nullable();
            $table->string('master_cgpa')->nullable();
            $table->string('ielts')->nullable();
            $table->string('study_destination')->nullable();
            $table->string('intake_month')->nullable();
            $table->string('intake_year')->nullable();
            $table->string('prepared_institution1')->nullable();
            $table->string('subject_of_interest1')->nullable();
            $table->string('prepared_institution2')->nullable();
            $table->string('subject_of_interest2')->nullable();
            $table->string('source')->nullable();
            $table->bigInteger('referrer')->nullable();
            $table->string('remarks')->nullable();
            $table->string('experience')->nullable();
            $table->string('photo');
            $table->string('passport_info');
            $table->string('academic_docs');
            $table->string('resume')->nullable();
            $table->string('language_proficiency')->nullable();
            $table->string('personal_statement')->nullable();
            $table->string('research_proposal')->nullable();
            $table->string('other1')->nullable();
            $table->string('other2')->nullable();
            $table->bigInteger('status')->default(1);
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
