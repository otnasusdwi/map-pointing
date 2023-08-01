<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Models\Lokasi;
use App\Models\Rute;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasis = Lokasi::orderBy('nama', 'ASC')->get();
        return view('admin.lokasi.index')->with(['lokasis' => $lokasis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lokasi = new Lokasi;
		$lokasi->nama = $request->nama;
		$lokasi->save();
			
		return redirect()->route('admin.lokasi')->with(['success' => 'Lokasi Berhasil Ditambahkan']);
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
    public function edit($id)
    {
        $lokasi = Lokasi::FindorFail($id);
        return view('admin.lokasi.edit')->with(['lokasi' => $lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Lokasi::where('id', $request->id)->update([
            'nama' => $request->nama,
        ]);
			
		return redirect()->route('admin.lokasi')->with(['success' => 'Lokasi Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Rute::where('start', $id)->orWhere('end', $id)->first();
        if (isset($cek)) {
            return redirect()->route('admin.lokasi')->with(['warning' => 'Lokasi Tidak Bisa Dihapus, Sedang Digunakan Untuk Rute']);
        }else{
            Lokasi::where('id', $id)->delete();
            return redirect()->route('admin.lokasi')->with(['success' => 'Lokasi Berhasil Dihapus']);
        }
    }
}
