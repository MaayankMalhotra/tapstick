<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerLead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'auth_provider',
        'discount_code',
        'ip_address',
    ];
}
