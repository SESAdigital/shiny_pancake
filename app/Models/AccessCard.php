<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessCard extends Model
{
    use HasFactory;

    protected $fillable = [

        'property_id',
        'SN',
        'name',
        'phone',
        'image',


    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
