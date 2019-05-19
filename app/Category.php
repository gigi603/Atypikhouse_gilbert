<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function house() {
        return $this->belongsTo('App\House');
    } 
    public function proprietes() {
        return $this->hasMany('App\Propriete');
    }
    
}