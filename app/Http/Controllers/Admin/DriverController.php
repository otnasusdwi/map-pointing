<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Models\Rute;

class DriverController extends Controller
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

        return view('admin.driver.index')->with(['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
        $user->assignRole('user');
		$user->save();
			
		return redirect()->route('admin.driver')->with(['success' => 'Driver Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = User::FindorFail($id);
        return view('admin.driver.edit')->with(['driver' => $driver]);
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
        if (isset($request->password)) {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }else{
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
		return redirect()->route('admin.driver')->with(['success' => 'Driver Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Rute::where('id_user', $id)->first();
        if (isset($cek)) {
            return redirect()->route('admin.driver')->with(['warning' => 'Driver Tidak Bisa Dihapus']);
        }else{
            User::where('id', $id)->delete();
            return redirect()->route('admin.driver')->with(['success' => 'Driver Berhasil Dihapus']);
        }
    }
}