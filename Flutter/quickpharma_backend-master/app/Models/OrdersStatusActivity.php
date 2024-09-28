<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersStatusActivity extends Model
{
    use HasFactory;
    protected $table ='orders_status_activity';
    protected $fillable = [
        'order_id',
        'added_by',
        'from',
        'to'
    ];
    protected $hidden = [
        'updated_at'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','added_by');
    }
}
