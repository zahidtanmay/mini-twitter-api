<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'post_id'
    ];

    public function post() {
        return $this->belongsTo('App\Model\Post');
    }

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

}
