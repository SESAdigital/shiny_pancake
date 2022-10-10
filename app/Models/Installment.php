<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $guarded = [
        'payment_id',
        'installementType',
        'installmentAmount',
        'start',
        'end'
    ];

    public function payment(){
        return $this->belongsTo(Payments::class);
    }

    
    // const CREATED_AT = 'startDate';
    // const UPDATED_AT = 'endDate';
    
    // public $timestamps = FALSE;

}
