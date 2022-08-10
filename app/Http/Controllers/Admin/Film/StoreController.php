<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Film\StoreRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Film;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $genreIds = $data['genre_ids'];
            unset($data['genre_ids']);


            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $data['trailer'] = Storage::disk('public')->put('/trailers', $data['trailer']);
            $data['film'] = Storage::disk('public')->put('/films', $data['film']);

            $film = Film::firstOrCreate($data);
            $film->genres()->attach($genreIds);
            DB::commit();
            
            return redirect()->route('film_index'); 
        } catch (Exception $e) {
            DB::rollBack();
            abort(500);
        }
    	
    }
}
