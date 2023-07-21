<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;

class RegencyController extends Controller
{
    
	public function create()
	{
		$provinces = Province::all();
		return view('regencyCreate', ['provinces' => $provinces]);
	}

	public function store(Request $request)
	{
		// dd($request);
		$data = $request->validate([
			'province_id' => 'required',
			'regency_name' => 'required',
            'total_population' => 'required'
		]);

		$newRegency = Regency::create($data);
		return redirect(route('welcome'))->with('success','data successfully added');
	}
}
