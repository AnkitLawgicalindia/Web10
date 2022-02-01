<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'mobile',
        'email',
        'address',
        'customer_id',
        'deliverey_id',
    ];
}
