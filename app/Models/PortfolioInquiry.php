<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioInquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'ip_address',
        'email_sent_to_user',
        'email_sent_to_admin',
    ];

    protected $casts = [
        'email_sent_to_user' => 'boolean',
        'email_sent_to_admin' => 'boolean',
    ];
}
