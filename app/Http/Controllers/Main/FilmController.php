<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    public function __invoke(Film $film)
    {
    	$genres = Genre::all();

    	return view('layouts.film',compact('film','genres'));
    }
}
