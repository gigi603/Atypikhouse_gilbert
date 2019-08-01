<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;

class Pays extends Model
{
    protected $fillable = ['pays_nom'];

    
    public function house() {
        return $this->hasMany('App\House');
    }
}
