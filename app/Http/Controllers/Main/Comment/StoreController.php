<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Film;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request,$id)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['film_id'] = (int)$id;

        Comment::create($data);

        return redirect()->back();
    }
}
