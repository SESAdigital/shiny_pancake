<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFID extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'SN',
        'VRNumber',
        'VMake',
        'VType',
        'image'
    ];


    public function property(){
        return $this->belongsTo(Property::class);
    }
}
