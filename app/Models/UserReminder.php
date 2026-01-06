<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReminder extends Model
{
    protected $fillable = [
        'user_id',
        'sent_on'
    ];
}
