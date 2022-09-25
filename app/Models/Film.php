<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

use App\Models\Genre;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'films';
    protected $guarded = false;

    public function genres()
    {
    	return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id');
    }
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
    public function orderByDescComments()
    {
    	return $this->hasMany(Comment::class)->orderBy('id','DESC')->get();
    }
}
