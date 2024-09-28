<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Mews\Purifier\Casts\CleanHtmlInput;

class Driver extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $table ='drivers';
    protected $fillable = [
        'name',
        'username',
        'email',
        'address',
        'phone',
        'avatar',
        'password',
        'status',
        'fcm_id',
        'latitude',
        'longitude'
    ];
    protected $hidden = [
        'updated_at',
        'password',
        'api_token',
        'email_verified_at'
    ];

    // protected $casts = [
    //     'name' => CleanHtmlInput::class,
    //     'username' => CleanHtmlInput::class,
    //     'email' => CleanHtmlInput::class,
    //     'address' => CleanHtmlInput::class,
    //     'phone' => CleanHtmlInput::class,
    //     'fcm_id' => CleanHtmlInput::class,
    // ];
   
        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [
            'id' => $this->id
        ];
    }
}
