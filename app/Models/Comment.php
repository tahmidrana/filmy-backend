<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'user_id', 'film_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
