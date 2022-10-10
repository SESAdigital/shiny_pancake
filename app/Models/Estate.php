<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'address',
    //     'no_of_resident_users',
    //     'security_company',
    //     'phone',
    //     'status',
    //     'latitude',
    //     'longitude',
    //     'descrption',
    //     'manager_id'
    // ];

    protected $guarded = [];

    public function manager(){
        return $this->belongsTo(Manager::class);
    }

    public function security(){
        return $this->belongsTo(SecurityCompany::class);
    }

    public function securityGuard(){
        return $this->belongsTo(SecurityGuard::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    public function property(){
        return $this->hasMany(Property::class);
    }

    public function advert(){
        return $this->hasMany(Advert::class);
    }


    public function estateStaff(){
        return $this->hasMany(EstateStaff::class);
    }
    

}
