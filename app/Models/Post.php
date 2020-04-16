<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'content'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment')->with('user');
    }

}
