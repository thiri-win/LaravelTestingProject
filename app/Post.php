<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'status',
    ];

    public function postOwner()
    {
        return $this->user_id == auth()->id() ? true : false;
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
