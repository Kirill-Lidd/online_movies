<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
    	$data = $request->validated();
    	$data['password'] = Hash::make($data['password']);
    	User::firstOrCreate(['email' => $data['email']], $data);
    	return redirect()->route('user_index');
    }
}
