<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Film;
use App\Models\Genre;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
    	$search = $request->search;
    	$films = Film::where('title','LIKE',"%{$search}%")->orderBy('title')->get();
    	$genres = Genre::all();

    	return view('layouts.search',compact('films','genres','search'));
    }
}
