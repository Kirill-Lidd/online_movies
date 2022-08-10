<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;


class CategoryController extends Controller
{
    public function categories()
    {
    	 return Category::all();	   	
    }
    public function genres()
    {
    	 return Genre::all();	   	
    }
}
