<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;

    protected $fillable = [

        'f_name',
        'l_name',
        'email',
        'category_id',
        'phone',
        'gender',
        'address',
        'business_name',
        'status',
        'image',
        'id_type',
        'id_number',

    ];

    // protected $gaurded = [];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function artisangroup(){
        return $this->hasMany(ArtisanGroup::class);
    }
}
