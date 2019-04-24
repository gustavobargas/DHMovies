<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;

class Movie extends Model
{
    protected $guarded = [];

    public function genre()
    {
    	return $this->belongsTo(Genre::class);
    }

    public function actors()
    {
    	return $this->belongsToMany(Actor::class);
    }

    public function actorsMinRating7()
    {
        return $this->actors->filter( function ($actor) { 
            return $actor->rating >= 7;
        });
    }

    public function bussyActors()
    {
        return $this->actors->filter(function ($actor) {
            $actor->movies->count() >= 3;
        });
    }

    public function sortByTitle()
    {
        return $this->orderBy('title');
    }

}
