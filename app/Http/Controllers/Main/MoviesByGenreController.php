<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class MoviesByGenreController extends Controller
{
    public function __invoke(Genre $genre)
    {
    	$by_genres = Genre::find($genre->id);
    	$genres = Genre::all();
  
    	return view('layouts.movies_by_genre',compact('by_genres','genres','genre'));
    }
}
