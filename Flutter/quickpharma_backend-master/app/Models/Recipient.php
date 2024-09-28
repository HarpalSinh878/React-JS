<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $table ='recipients';
    protected $fillable = [
        'name',
        'email',
        'delivery_address',
        'address',
        'city',
        'zip',
        'state',
        'apt',
        'phone',
        'home_phone',
        'other_email'
    ];
    protected $hidden = [
        'updated_at'
    ];

}
