<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'company_name',
        'contract_period',
        'contract_id',
        'contract_start',
        'contract_expiration',
        'address',
        'director',
        'bank',
        'rs',
        'mfo',
        'inn',
        'phone',
        'oked',
        'email',
        'status'
    ];
    // protected $dates = [
    //     'contract_start', 
    //     'contract_expiration'
    // ];
    // protected $dateFormat = 'd-m-Y';
}
