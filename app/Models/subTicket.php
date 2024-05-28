<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'message',
        'is_admin'
    ];
}
