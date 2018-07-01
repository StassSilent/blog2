<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorypage extends Model
{
    protected $fillable = [
        'id',
        'type_category',
        'language',
        'priceMin',
        'priceMax',
        'complexity',
        'dateStart',
        'dateFinish',
        'ad',
        'img',
        'user'
    ];

    public function category()
    {
        return $this->hasMany(Category::class,  'id', 'category');
    }



}
