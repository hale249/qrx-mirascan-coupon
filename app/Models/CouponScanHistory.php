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
        'customer_id',
    ];

    public function qrcode()
    {
        return $this->belongsTo(QRCode::class, 'qrcode_id', '_id');
    }

    public function qrResponse()
    {
        return $this->belongsTo(QrResponse::class, 'qr_response_id', '_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id', '_id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', '_id');
    }
}
