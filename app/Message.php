<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'dialog',
        'id_from',
        'id_to',
        'message'
    ];
    public function user_from()
    {
        return $this->hasMany(Dialog::class,  'id', 'dialog');
    }


}
