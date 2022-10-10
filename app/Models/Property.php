<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // use Uuids;
    use HasFactory;
    protected $fillable = [
        'flat_block_number',
        'business_name',
        'street_name',
        'address_description',
        'propertyCode',
        'image',
        'estate_id',
        'property_category',
        'property_type_id',
    ];



    public function estate(){
        return $this->belongsTo(Estate::class);
    }

    public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }


    public function propertyCategory(){
        return $this->belongsTo(PropertyCategory::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    public function houseHold(){
        return $this->hasOne(HouseHold::class);
    }

    public function accessCard(){
        return $this->hasMany(AccessCard::class);
    }


    public function siteWorker(){
        return $this->hasMany(SiteWorker::class);
    }


}
