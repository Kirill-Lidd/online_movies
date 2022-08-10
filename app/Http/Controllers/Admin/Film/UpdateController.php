<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Film\UpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Film;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Film $film)
    {	

    	try {
			DB::beginTransaction();
    		$data = $request->validated();
    		$genreIds = $data['genre_ids'];
    		unset($data['genre_ids']);

    		if(isset($data['image'])) $data['image'] = Storage::disk('public')->put('/images', $data['image']);
    		if(isset($data['trailer'])) $data['trailer'] = Storage::disk('public')->put('/trailers', $data['trailer']);
    		if(isset($data['film'])) $data['film'] = Storage::disk('public')->put('/films', $data['film']);

    		$film->update($data);
    		$film->genres()->sync($genreIds);
			DB::commit();
            
    	    return redirect()->route('film_index');
    	} catch (Exception $e) {
    		DB::rollBack();
    		abort(500);
    	}
    	 
    }

    
}
