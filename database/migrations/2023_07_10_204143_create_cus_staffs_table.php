<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCusStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cus_staffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('agency_id');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number', 20)->nullable();
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
        Schema::dropIfExists('cus_staffs');
    }
}
