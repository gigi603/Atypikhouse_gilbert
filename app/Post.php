<?php 
namespace App; 
use Illuminate\Notifications\Notifiable;

 
use Illuminate\Database\Eloquent\Model; 
 
class Post extends Model 
{
    use Notifiable;
    public function admin() {
        return $this->belongsTo('App\Admin');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function house() {
        return $this->belongsTo('App\House');
    }

} 