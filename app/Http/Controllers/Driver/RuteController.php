<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Rute;
use App\Models\LangLong;
use Auth;
use File;

class RuteController extends Controller
{
   public function index() {

		$rute = Rute::join('lokasi as l1', 'l1.id', '=', 'rute.start')
		->join('lokasi as l2', 'l2.id', '=', 'rute.end')
		->where('rute.id_user', Auth::user()->id)
		->select('l1.nama as nama_start', 'l2.nama as nama_end','rute.*')
		->orderBy('rute.id', 'DESC')
		->get();

		// dd(Auth::user());

		return view('driver.rute.index')->with(['rute' => $rute]);
	}

	public function home() {
		return view('rute.home');
	}

	public function list($id_rute) {
		$langlong = LangLong::where('id_rute', $id_rute)->orderBy('created_at', 'DESC')->get();
		// dd($langlong);
		$rute = Rute::FindorFail($id_rute);
		// dd($rute);
		return view('driver.rute.list')->with([
			'id_rute' => $id_rute,
			'rute' => $rute,
			'langlong' => $langlong
		]);
	}

   public function create($id_rute) {
		$rute = Rute::FindorFail($id_rute);
		return view('driver.rute.create')->with([
			'id_rute' => $id_rute,
			'rute' => $rute,
		]);
	}

	public function store(Request $request)
	{
		// dd($request);

		$last = LangLong::where('id_rute', $request->id_rute)->orderBy('created_at', 'DESC')->first();
		if (isset($last)) {
			$titik = $last->titik + 1;
		}else{
			$titik = 1;
		}
		// dd($last);
		$langlong = new LangLong;
		$langlong->id_rute = $request->id_rute;
		$langlong->lang = $request->lang;
		$langlong->long = $request->long;
		$langlong->titik = $titik;
		$langlong->id_user = Auth::user()->id;
		$langlong->save();

		return redirect()->route('driver.rute.list', $request->id_rute)->with(['success' => 'Rute Berhasil Ditambahkan']);
	}
}
