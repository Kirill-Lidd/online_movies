<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;

class DestroyController extends Controller
{
    public function __invoke(Film $film)
    {	
    	$film->delete();
    	return redirect()->back();
    }
}
