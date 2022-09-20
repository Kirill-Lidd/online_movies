<?php

namespace App\Http\Controllers\Admin\Film\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Film;


class IndexController extends Controller
{
	public function __invoke(Film $film)
	{
    	$comments = $film->comments;
        $typeComment = Comment::getTypeComment();

    	return view('admin.film.comment.index',
            compact('comments','typeComment')
        );
	}
}
