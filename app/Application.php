<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $dates = ['from_date', 'to_date', 'performed_date'];
    
    public function from_city(){
        return $this->belongsTo(Region::class, 'from_city_id');
    }
    public function to_city(){
        return $this->belongsTo(Region::class, 'to_city_id');
    }
    public function from_district(){
        return $this->belongsTo(District::class, 'from_district_id');
    }
    public function to_district(){
        return $this->belongsTo(District::class, 'to_district_id');
    }
    public function company()
    {
        return $this->belongsTo(Contract::class, 'number_contract', 'contract_id');
    }
    public function operator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
