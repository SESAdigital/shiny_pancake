<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'duesName',
        'trackPayment',
        'status',
        'amount',
        'amountType',
        'start',
        'end',
        'houseHold_id',
        'user_id',
        'paymentPlan'
    ];


    public function installment(){
        return $this->hasMany(Installment::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function houseHold(){
        return $this->belongsTo(HouseHold::class);
    }

    // const CREATED_AT = 'startDate';
    // const UPDATED_AT = 'endDate';
    
    // public $timestamps = FALSE;
}
