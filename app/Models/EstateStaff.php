<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateStaff extends Model
{
    use HasFactory;

    protected $guarded= [];


    public function estate(){
        return $this->belongsTo(Estate::class);
    }
}
