<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Propriete extends Model
{
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function admin() {
        return $this->belongsTo('App\Admin');
    }

    public function valuecatproprietes() {
        return $this->hasMany('App\Valuecatpropriete');
    }

}