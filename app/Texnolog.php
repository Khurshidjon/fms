<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texnolog extends Model
{
    protected $fillable = [
        'from_city_id',
        'to_city_id',
        'from_district_id',
        'to_district_id',
        'weight',
        'delivery_time',
        'with_courier_from_home_price',
        'with_courier_to_home_price',
        'service_price',
    ];

    public function from_city()
    {
        return $this->belongsTo(Region::class, 'from_city_id');
    }
    
    public function to_city()
    {
        return $this->belongsTo(Region::class, 'to_city_id');
    }
    
    public function from_district()
    {
        return $this->belongsTo(District::class, 'from_district_id');
    }
    
    public function to_district()
    {
        return $this->belongsTo(District::class, 'to_district_id');
    }
}
