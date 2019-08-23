<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function gallery()
    {
        $this->belongsTo(Gallery::class);
    }
}
