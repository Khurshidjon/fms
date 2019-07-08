<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];
    public function country_zone()
    {
        return $this->belongsToMany(CategoryInterTech::class, 'techno_country', 'id_category_inter_techno', 'id_country');
    }
}
