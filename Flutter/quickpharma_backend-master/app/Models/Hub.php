<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use Mews\Purifier\Casts\CleanHtmlInput;

class Hub extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table ='hubs';
    protected $fillable = [
        'facility',
        'title',
        'address',
        'location',
        'area',
        'path'
    ];
    protected $hidden = [
        'updated_at'
    ];
    protected $casts = [
        'location' => Point::class,
        'area' => Polygon::class
        // 'facility' => CleanHtmlInput::class,
        // 'title' => CleanHtmlInput::class,
        // 'address' => CleanHtmlInput::class,
    ];
    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }
}
