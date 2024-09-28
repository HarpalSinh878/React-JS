<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;

use MatanYadaev\EloquentSpatial\Objects\Polygon;

class Regions extends Model
{
    use HasFactory;
    protected $table ='regions';
    protected $fillable = [
        'route_name',
        'route_name_id',
        'route_name_i',
        'path',
        'area',
        'service_time',
        'starts_at',
        'sameday_delivery',
        'sameday_start_place',
        'sameday_finish_place',
        'is_queued',
        'is_real',
        'total_order',
        'started',
        'is_started',
        'hub_start_lat',
        'hub_start_lng',
        'hub_finish_lat',
        'hub_finish_lng',
        'is_route_optimized',
        'is_finished',
        'last_stop',
        'driver_current_location',
        'approximate_driving_time',
        'distance',
        'actual_driving_time',
        'sessionId',
        'driver_id',
        'dispatcher_id'
    ];
    protected $casts = [
        'area' => Polygon::class,
    ];
    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }

    protected $hidden = [
        'updated_at'
    ];

    public function route()
    {
        return $this->hasOne(Route::class,'id','route_name_id');
    }

    public function dispatcher()
    {
        return $this->hasOne(User::class,'id','dispatcher_id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class,'id','driver_id');
    }
}
