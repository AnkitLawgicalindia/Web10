<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_address extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_address',
        'customer_id',
    ];
}
