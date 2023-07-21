<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
	public function index()
	{
		$provinces = Province::all();
		return view('welcome', ['provinces' => $provinces]);
	}

	public function create()
	{
		return view('provinceCreate');
	}

	public function store(Request $request)
	{
		// dd($request);
		$data = $request->validate([
			'province_name' => 'required'
		]);

		$newProvince = Province::create($data);
		return redirect(route('welcome'));
	}

	public function edit(Province $province)
	{
		//dd($province);
		return view('provinceEdit', ['province' => $province]);
	}

	public function update(Province $province, Request $request)
	{
		// dd($request);
		$data = $request->validate([
			'province_name' => 'required'
		]);

		$province->update($data);
		return redirect(route('welcome'))->with('success','data successfully updated');
	}

	public function destroy(Province $province){
		$province->delete();
		return redirect(route('welcome'))->with('success','data successfully deleted');

	}
}
