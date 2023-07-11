<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;

class QRCode extends Model
{
    use SoftDeletes;
    protected $table = 'qrcodes';

    protected $fillable = [
        'name', 'code', 'url', 'note'
    ];
}
