<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use App\Models\Genre;

class EditController extends Controller
{
    public function __invoke(Film $film)
    {
    	$genres = Genre::all();
    	$categories = Category::all();

    	return view('admin.film.edit', compact('film','genres','categories'));
    }
}
