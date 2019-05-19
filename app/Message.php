<?php 
 
namespace App; 
 
use Illuminate\Database\Eloquent\Model; 
 
class Message extends Model 
{
    public function admin() {
        return $this->belongsTo('App\Admin');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
} 