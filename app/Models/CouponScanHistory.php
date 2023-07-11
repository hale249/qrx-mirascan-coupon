<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponScanHistory extends Model
{
    protected $table = 'coupon_scan_histories';
    protected $fillable = [
        'qr_response_id',
        'agency_id',
        'staff_id',
    ];
}
