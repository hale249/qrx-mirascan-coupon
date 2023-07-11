<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class CouponScanHistory extends Model
{
    protected $table = 'coupon_scan_histories';
    protected $fillable = [
        'qr_response_id',
        'agency_id',
        'staff_id',
        'qrcode_id',
    ];

    protected function qrcode()
    {
        return $this->belongsTo(QRCode::class, 'qrcode_id', '_id');
    }

//    protected function qrResponse()
//    {
//        return $this->hasOne(QrResponse::class, 'qr_response_id', '_id');
//    }
//
//    protected function staff()
//    {
//        return $this->hasOne(User::class, 'staff_id', '_id');
//    }
//
//    protected function agency()
//    {
//        return $this->hasOne(Agency::class, 'agency_id', '_id');
//    }
}
