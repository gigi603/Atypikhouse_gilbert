<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'email_token', 'verified', 'newsletter', 'date_birth'
    ];

    //protected $dates = ['start_date'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }

    /*public function houses() {
        return $this->hasMany('App\House');
    }*/
    public function houses()
    {
        return $this->hasMany('App\House');
    }
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function proprietes() {
        return $this->hasMany('App\Propriete');
    }

    public function valuecatproprietes() {
        return $this->hasMany('App\ValuecatPropriete');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }
    
}
