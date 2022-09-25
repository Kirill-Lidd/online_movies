<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;

class HomeController extends Controller
{
    public function __invoke()
    {
    	$films = Film::orderBy('id','DESC')->paginate(20);
    	$genres = Genre::All();
    	return view('layouts.home',compact('films','genres'));
    }
}
