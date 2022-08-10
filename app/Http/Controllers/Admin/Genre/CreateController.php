<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genre\StoreRequest;
use App\Models\Genre;

class CreateController extends Controller
{
	public function __invoke()
	{
    	return view('admin.genre.create');
	}
}
