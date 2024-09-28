<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table ='tickets';
    protected $fillable = [
        'description',
        'priority',
        'type',
        'status',
        'assign_to',
        'managed_by',
        'order_id',
        'added_by',
        'last_status_update',
        'last_updated_by',
        'close',
        'close_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at'
    ];


    public function addedby(){
        return $this->hasOne(User::class,'id','added_by');
    }

    public function lastupdatedby(){
        return $this->hasOne(User::class,'id','last_updated_by');
    }
}
