<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    use HasFactory;
    protected $table ='orders_types';
    protected $fillable = [
        'order_type',
        'user_type',
        'isActive'
    ];
    protected $hidden = [
        'updated_at'
    ];
}
