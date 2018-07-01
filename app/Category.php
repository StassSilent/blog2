<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
   protected $fillable = [
        'id',
        'category'
    ];
    public function categorypages()
    {
        return $this->belongsTo(Categorypage::class);
    }

}
