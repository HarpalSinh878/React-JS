<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Order extends Model
{
    use HasFactory;

    protected $table ='orders';
    protected $fillable = [
        'status',
        'user_id',
        'recipient_id',
        'request_call_upon_arrival',
        'include_insurance',
        'order_total_price',
        'insurance_rate',
        'delivery_methods_type',
        'special_instructions',
        'weight',
        'items',
        'copay',
        'order_type',
        'subtype_fridge',
        'store_in_fridge',
        'subtype_confidential',
        'subtype_sensitive',
        'subtype_hazardous',
        'subtype_controlled',
        'subtype_woundcare',
        'documents_to_sign_by_recipient',
        'date_to_deliver',
        'time_window_deliveries',
        'pickup_date',
        'pickup_time_min',
        'pickup_time_max',
        'recipient_email_to_owner',
        'operator_initials',
        'is_sms',
        'condition',
        'facility',
        'hub',
        'added_by',
        'latitude',
        'longitude',
        'location',
        'address',
        'order_sequence'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   
    protected $casts = [
        'location' => Point::class,
    ];

    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }
    public function recipient(){
        return $this->hasOne(Recipient::class,'id','recipient_id');
    }

    public function client(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function prescriptions(){
        return $this->hasMany(Prescriptions::class,'order_id','id');
    }

    public function driver(){
        return $this->hasOne(Driver::class,'id','driver_id');
    }

    public function order_document(){
        return $this->hasMany(OrdersDocument::class,'order_id','id');
    }
    public function dispatcher(){
        return $this->hasOne(Driver::class,'id','dispatcher_id');
    }

}
