<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'estate_id',
        'artisan_id',
        'name',
        'status',
    ];


    public function artisan(){
        return $this->belongsTo(Artisan::class);
    }

    public function estate(){
        return $this->belongsTo(Estate::class);
    }

}
