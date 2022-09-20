<?php

namespace App\Http\Controllers\Admin\Film\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DestroyController extends Controller
{
    public function __invoke(Comment $comment)
    {

    	$comment->delete();
    	return redirect()->back();
    }
}
