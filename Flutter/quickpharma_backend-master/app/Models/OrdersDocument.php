<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDocument extends Model
{
    use HasFactory;
    protected $table ='orders_document';
    protected $fillable = [
        'order_id',
        'document',
        'type',
    ];
    protected $hidden = [
        'updated_at'
    ];
}
