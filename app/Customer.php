<?php

namespace App;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Filterable;
    protected $fillable = [
        'name',
        'email',
        'address',
        'country',
        'about',
    ];
    public function getCustomerImageUrl()
    {
        $avator = strtolower($this->name);
        $avator_img = "https://api.adorable.io/avatars/120/{$avator}.png";

        return $avator_img;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
