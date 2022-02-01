<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_requirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'design',
        'description',
        'status',
        'customer_id',
    ];
}
