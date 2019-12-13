<?php 
 
namespace App; 
 
use Illuminate\Database\Eloquent\Model; 
 
class Newsletter extends Model 
{
    public function admin() {
        return $this->belongsTo('App\Admin');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
} 