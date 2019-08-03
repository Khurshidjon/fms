<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
  protected $guarded = [];
   public function user()
   {
     return $this->hasMany(User::class);
   }
}
