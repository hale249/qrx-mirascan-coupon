<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class QRCode extends Model
{
    protected $collection = 'qrcode';
    protected $table = 'qrcode';
}
