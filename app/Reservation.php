<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Reservation extends Model
{
    protected $fillable = ['id', 'user_id','house_id', 'payment_id', 'reserved','start_date', 'end_date'];
 
    public function house()
    {
        return $this->belongsTo('App\House');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
 
    function user(){
        return $this->belongsTo('App\User');
    }
 
}