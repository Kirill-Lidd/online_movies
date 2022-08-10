<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Category;

class CreateController extends Controller
{
	public function __invoke()
	{
		$genres = Genre::all();
		$categories = Category::all();
    	return view('admin.film.create', compact('genres','categories'));
	}
}
