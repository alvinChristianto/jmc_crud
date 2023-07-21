<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;

class ProvinceController extends Controller
{
	public function index()
	{
		$arrOfSum = array();
		$provinces = Province::all();

		// dd($provinces[0]->id);
		foreach($provinces as $x => $val) {

			//dd($val);
			$regencyofProvince = Regency::where('province_id', $val->id)->get();
			$sumTotalPopulation = $regencyofProvince->sum('total_population');
			
			array_push($arrOfSum,$sumTotalPopulation);
		}
		
		return view('welcome', ['provinces' => $provinces, 'sum_population' => $arrOfSum]);
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

	public function searchProvince(Request $request) {
		$arrOfSum = array();
		$data = $request->validate([
			'province_name' => 'required'
		]);
		$province = Province::where('province_name',$request->province_name)->get();

		foreach($province as $x => $val) {

			//dd($val);
			$regencyofProvince = Regency::where('province_id', $val->id)->get();
			$sumTotalPopulation = $regencyofProvince->sum('total_population');
			
			array_push($arrOfSum,$sumTotalPopulation);
		}
		
		return view('welcome', ['provinces' => $province,'sum_population' => $arrOfSum]);
	}
}
