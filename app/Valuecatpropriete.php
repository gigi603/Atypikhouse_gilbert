<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Valuecatpropriete extends Model
{
    protected $table = "valuecatproprietes";
    protected $fillable = ['value'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function house() {
        return $this->belongsTo('App\House', 'house_id');
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function propriete() {
        return $this->belongsTo('App\Propriete', 'propriete_id');
    }
}