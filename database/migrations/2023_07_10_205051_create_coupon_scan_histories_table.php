<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponScanHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_scan_histories', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('qr_response_id');
            $table->string('qrcode_id');
            $table->string('agency_id');
            $table->string('staff_id');
            $table->timestamps();
            $table->index(['customer_id', 'qr_response_id', 'qrcode_id', 'agency_id', 'staff_id'], 'idx_info_group_coupon_scan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_scan_histories');
    }
}
