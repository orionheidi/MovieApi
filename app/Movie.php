<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    const GENERES = ['horror','triler','crime','comedy','drama'];

    protected $fillable = [
        'title', 'director', 'imageUrl','duration','releaseDate','genere'
    ];
}
