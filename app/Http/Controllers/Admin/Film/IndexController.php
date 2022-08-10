<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class IndexController extends Controller
{
	public function __invoke()
	{
    	$films = Film::all();
    	return view('admin.film.index', compact('films'));
	}
}
