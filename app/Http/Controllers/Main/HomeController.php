<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class HomeController extends Controller
{
    public function __invoke()
    {
    	$films = Film::all();
    	$genres = Genre::All();
    	return view('layouts.home',compact('films','genres'));
    }
}
