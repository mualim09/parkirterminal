<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Input;
use Redirect;
use DB;

class Pembayaran extends Controller {

	public function add()
	{
		if (Input::get('idtempat_parkir')!="Tidak ada"){
			$idtempat_parkir = substr(stripos(Input::get('idtempat_parkir'), ":"),1);
		} else{
			$idtempat_parkir = NULL;
		}

		if (Input::get('idtempat_lahan')!="Tidak ada"){
			$idtempat_lahan = substr(stripos(Input::get('idtempat_lahan'), ":"),1);
		} else{
			$idtempat_lahan = NULL;
		}

		DB::table('pembayaran')->insert([
			'id_pemilik' => Input::get('no-ktp'),
			'id_tempat_parkir' => $idtempat_parkir,
			'id_tempat_lahan' => $idtempat_lahan,
			'pembayaran_terakhir' => Carbon::now()->month." ".Carbon::now()->year,
		]);
		
		$ext = Input::file('unggah')->getClientOriginalExtension();

		if ($idtempat_parkir!=NULL){
			$var = "parkir"."_".$idtempat_parkir;
		} else{
			$var = "lahan"."_".$idtempat_lahan;
		}
		Input::file('unggah')->move(storage_path(),Input::get('no-ktp').'_'.Carbon::now()->month.'_'.$var.'.'.$ext);
		
		return Redirect::action('SiteController@home');
	}

}
