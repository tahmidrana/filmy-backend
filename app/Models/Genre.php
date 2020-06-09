<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function films()
    {
        return $this->belongsToMany('App\Models\Film', 'film_genre');
    }
}
