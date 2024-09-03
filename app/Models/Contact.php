<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'birthdate', 'email', 'profession', 'phone', 'telephone', 'whatsapp', 'send_sms', 'send_email'
    ];
}

