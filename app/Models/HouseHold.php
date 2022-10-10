<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseHold extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'user_id',
        'numberOfAlpha',
        'numberOfResidentUser',
        'RClass',
        'RCat',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasMany(Payments::class);
    }

}
