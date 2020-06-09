<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'description', 'release_date', 'rating', 'ticket_price', 'country', 'photo'];
    
    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre', 'film_genre');
    }
}
