<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;

class Ville extends Model
{
    protected $fillable = ['ville_nom'];

    
    public function house() {
        return $this->hasMany('App\House');
    }
}
