<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genre\StoreRequest;
use App\Models\Genre;

class IndexController extends Controller
{
	public function __invoke()
	{
    	$genres = Genre::all();
    	return view('admin.genre.index', compact('genres'));
	}
}
