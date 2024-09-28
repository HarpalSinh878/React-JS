<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersActivity extends Model
{
    use HasFactory;
    protected $table = 'orders_activity';
    protected $fillable = [
        'type',
        'order_id',
        'added_by',
        'activity'
    ];
    protected $hidden = [
        'updated_at'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
