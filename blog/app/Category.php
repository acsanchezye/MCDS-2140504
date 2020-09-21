<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	Protected $fillable = [
        'name',
        'image',
        'description',
    ];
      public function game()
    {
        return $this->hasMany('App\Game');


    }


   }
