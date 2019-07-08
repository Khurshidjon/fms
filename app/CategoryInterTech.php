<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryInterTech extends Model
{
    protected $table = 'category_inter_tech';
    protected $guarded = [];
    public function country_zone()
    {
        return $this->belongsToMany(Country::class, 'techno_country', 'id_country', 'id_category_inter_techno');
    }
}
