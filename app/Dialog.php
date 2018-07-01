<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'from_id',
        'to_id'
    ];
    public function user_from()
    {
        return $this->hasMany(User::class,  'id', 'from_id');
    }


    public function user_to()
    {
        return $this->hasMany(User::class,  'id', 'to_id');
    }


}
