<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Agency extends Model
{
    use SoftDeletes;
    protected $table = 'cus_agencies';
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone_number',
        'address',
        'staff_count',
        'verify_count',
    ];
}
