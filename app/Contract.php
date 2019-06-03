<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'company_name',
        'user_id',
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
  public function operator()
  {
      return $this->belongsTo(User::class, 'user_id');
  }

}
