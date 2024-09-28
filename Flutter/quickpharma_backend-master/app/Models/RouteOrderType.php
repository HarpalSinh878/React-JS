<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteOrderType extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'route_id',
        'order_types'
    ];
    protected $hidden = [
        'updated_at'
    ];
}
