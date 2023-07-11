<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCusAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cus_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id', 50)->unique();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->tinyInteger('is_active')->default(true)->nullable();
            $table->text('logo')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('cus_accounts');
    }
}
