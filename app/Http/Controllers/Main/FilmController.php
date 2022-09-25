<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    public function __invoke(Film $film)
    {
    	$genres = Genre::all();
        $typeComment = Comment::getTypeComment();
        $comments = $film->orderByDescComments();

    	return view('layouts.film',compact('film','genres','typeComment','comments'));
    }
}
