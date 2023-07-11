<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'cus_agencies';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'address',
        'staff_count',
        'verify_count',
    ];
}
