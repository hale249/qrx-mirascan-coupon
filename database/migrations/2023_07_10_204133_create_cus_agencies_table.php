<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCusAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cus_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->index('idx_customer_id_cus_agencies');
            $table->string('name')->index('indx_name_cus_agencies');
            $table->string('email', 50);
            $table->string('phone_number', 20);
            $table->text('address')->nullable();
            $table->integer('staff_count')->default(0)->nullable();
            $table->integer('verify_count')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cus_agencies');
    }
}
