<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | This file is where you may define all of the routes that are handled
 * | by your application. Just tell Laravel the URIs it should respond
 * | to using a Closure or controller method. Build something great!
 * |
 */
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Data;

Route::get ( '/', function () {
	$data = Data::all ();
	return view ( 'welcome' )->withData ( $data );
} );
Route::post ( '/', function (Request $request) {
	$rules = array (
			'name' => 'required|alpha_num' 
	);
	$validator = Validator::make ( Input::all (), $rules );
	if ($validator->fails ()) {
		return Redirect::back ()->withErrors ( $validator );
	} else {
		$data = new Data ();
		$now = new DateTime ();
		$standard_date = $now->format ( 'j M Y H:i:s A e' );
		$standard_months = array (
				"Dec",
				"Nov",
				"Oct",
				"Sep",
				"Aug",
				"Jul",
				"Jun",
				"May",
				"Apr",
				"Mar",
				"Feb",
				"Jan" 
		);
		$arabic_months = array (
				"ديسمبر",
				"نوفمبر",
				"أكتوبر",
				"سبتمبر",
				"أغسطس",
				"يوليو",
				"يونيو",
				"مايو",
				"أبريل",
				"مارس",
				"فبراير",
				"يناير" 
		);
		$arabic_date = str_replace ( $standard_months, $arabic_months, $standard_date );
		$data->name = $request->name;
		$data->date = $arabic_date;
		$data->save ();
		return Redirect::back ();
	}
} );
