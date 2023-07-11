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
            $table->string('name');
            $table->string('customer_id', 50)->index('idx_customer_id_cus_accounts');
            $table->string('customer_uid', 100)->index('idx_customer_uid_cus_accounts');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->tinyInteger('is_active')->default(true)->nullable();
            $table->text('logo')->nullable();
            $table->text('note')->nullable();
            $table->string('remember_token', 100)->nullable();
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
