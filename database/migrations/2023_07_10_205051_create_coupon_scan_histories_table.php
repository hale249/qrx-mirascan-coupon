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
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('qr_response_id');
            $table->unsignedInteger('qrcode_id');
            $table->unsignedInteger('agency_id');
            $table->unsignedInteger('staff_id');
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
