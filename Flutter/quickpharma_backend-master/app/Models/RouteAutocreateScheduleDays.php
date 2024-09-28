<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteAutocreateScheduleDays extends Model
{
    use HasFactory;
    protected $table ='route_autocreate_schedule_days';
    protected $fillable = [
        'route_id',
        'days',
        'hours',
        'minute'
    ];
    protected $hidden = [
        'updated_at'
    ];
}
