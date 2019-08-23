<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function album()
    {
        $this->hasMany(Album::class);
    }
}
