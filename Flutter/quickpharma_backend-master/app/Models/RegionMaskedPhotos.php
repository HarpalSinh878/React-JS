<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionMaskedPhotos extends Model
{
    use HasFactory;
    protected $table ='masked_photos';
    protected $fillable = [
        'regions_id',
        'mask_photo',
        'status',
    ];
    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
    ];
}
