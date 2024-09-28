<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $table ='route';
    protected $fillable = [
        'route_name',
        'autocreation',
        'order_types',
        'optimal_service_time_per_stop',
        'optimal_orders_number_per_route',
        'driver_id'
    ];
    protected $hidden = [
        'updated_at'
    ];

    protected $appends = [
        'ordertype'
    ];
    public function getOrderTypeAttribute()
    {
       return OrderType::select('id','order_type')->whereIN('id',explode(',',$this->order_types))->get();
    }

    public function routeautocreatescheduledays()
    {
        return $this->hasMany(RouteAutocreateScheduleDays::class,'route_id','id');
    }

    public function driver(){
        return $this->hasOne(Driver::class,'id','driver_id');
    }
}
