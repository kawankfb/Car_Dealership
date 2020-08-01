<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UncheckedProduct extends Model
{
    protected $fillable = [
        'price',
        'title',
        'explanation',
        'distance',
        'damage',
        'production_date',
        'color',
        'manufacturer',
        'model',
        'user_id',
        'fuel_type',
        'province',
        'city',
        'car_type'
    ];
    //
}
