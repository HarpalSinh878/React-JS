<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriptions extends Model
{
    use HasFactory;

    protected $table ='prescriptions_no';
    protected $fillable = [
        'order_id',
        'rx_number',
        'date_filled'
    ];
    protected $hidden = [
        'updated_at'
    ];
}
