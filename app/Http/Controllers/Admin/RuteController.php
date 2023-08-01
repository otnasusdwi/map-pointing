<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Models\Rute;
use App\Models\Lokasi;
use App\Models\LangLong;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = DB::table('model_has_roles')
		->join('users', 'model_has_roles.model_id', '=', 'users.id')
        ->where('model_has_roles.role_id', 2)
		->select('users.name', 'users.id')
        ->orderBy('users.created_at', 'DESC')
		->get();

        return view('admin.rute.index')->with(['drivers' => $drivers]);
    }

    public function list($id_user)
    {
        $rutes = Rute::join('lokasi as l1', 'l1.id', '=', 'rute.start')
		->join('lokasi as l2', 'l2.id', '=', 'rute.end')
		->where('rute.id_user', $id_user)
		->select('l1.nama as nama_start', 'l2.nama as nama_end','rute.*')
		->orderBy('rute.id', 'DESC')
		->get();

        return view('admin.rute.list')->with([
            'id_user' => $id_user,
            'rutes' => $rutes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_user)
    {
        $lokasis = Lokasi::orderBy('nama', 'ASC')->get();
        return view('admin.rute.create')->with([
            'id_user' => $id_user,
            'lokasis' => $lokasis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_user)
    {
        $rute = new Rute;
		$rute->start = $request->start;
		$rute->end = $request->end;
		$rute->id_user = $id_user;
		$rute->save();

		return redirect()->route('admin.rute.list', $id_user)->with(['success' => 'Rute Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rute)
    {
        $rute = Rute::FindorFail($id_rute);
        // dd($rute);
        $lokasis = Lokasi::orderBy('nama', 'ASC')->get();
        return view('admin.rute.edit')->with([
            'id_rute' => $id_rute,
            'rute' => $rute,
            'lokasis' => $lokasis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Rute::where('id', $id)->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
			
		return redirect()->route('admin.rute.list', $request->id_user)->with(['success' => 'Rute Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rute)
    {
        $cek = LangLong::where('id_rute', $id_rute)->get();
        if (count($cek) != 0) {
            $cek->delete();
            Lokasi::where('id', $id_rute)->delete();
            return redirect()->back()->with(['warning' => 'Rute Berhasil Dihapus']);
        }else{
            Lokasi::where('id', $id_rute)->delete();
            return redirect()->back()->with(['success' => 'Rute Berhasil Dihapus']);
        }
    }
}
