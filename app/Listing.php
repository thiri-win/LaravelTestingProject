<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'product', 
        'product_info', 
        'in_stock',
        'price',
        'remark'
    ];
}