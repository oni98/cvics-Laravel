<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('agency_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact_person');
            $table->string('designation');
            $table->string('phone');
            $table->string('skype');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('zipcode');
            $table->string('web_address')->nullable();
            $table->string('logo');
            $table->string('license');
            $table->string('nid_or_passport');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('agents');
    }
}
