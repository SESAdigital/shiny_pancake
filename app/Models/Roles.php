<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Roles extends Model
{
    use HasFactory;

    protected $guarded=[];

    // public function users(){
    //     return $this->hasMany(User::class, 'role_id');
    // }
}
