<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categorypages()
    {
        return $this->belongsTo(Categorypage::class);
    }

    public function dialogs()
    {
        return $this->belongsTo(Dialog::class);
    }
    public function isAdmin(){

        return $this->grant==1;
    }
    public function isRedactor(){
        return $this->grant==2;
    }

    public function isBlock(){
        return $this->block==1;
    }
    public function get_panel()
    {

    }
}




