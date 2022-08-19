<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = [
        'orderid',
        'email',
        'total',
        'status',
        'timeselect',
    ];
}
