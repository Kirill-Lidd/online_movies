<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Category;

class MoviesByCategoryController extends Controller
{
    public function __invoke(Category $category)
    {
    	$films = Film::where('category_id',$category->id)->get();

    	return view('layouts.movies_by_category',compact('films','category'));
    }
}
