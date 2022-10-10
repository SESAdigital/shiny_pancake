<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     // 'f_name',
    //     'email',
    //     'password',
    //     'role_id'
    // ];

    // protected $guarded = [];

    protected $fillable = [


        "f_name",
        "email",
        "phone",
        "image",
        "gender",
        "status",
        "id_type",
        "id_number",
        "password",
     //    "estate_id",
         // "otp",
 
     ];


    // public function role(){
    //     return $this->belongsTo(Roles::class, 'role_id');
    // }

    public function estate(){
        return $this->belongsTo(Estate::class);
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function houseHold(){
        return $this->belongsTo(HouseHold::class);
    }

    public function payment(){
        return $this->hasMany(Payments::class);
    }


    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier() {
        return $this->getKey();
    }


    public function getJWTCustomClaims() {
        return [];
    }
}
