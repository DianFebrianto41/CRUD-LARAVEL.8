<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datafakultas = Fakultas::All();
        $dataprodi = Prodi::all();
        return view('admin.prodi.index', compact('dataprodi', 'datafakultas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $datafakultas = new Fakultas();
        $dataprodi = new Prodi();
        $dataprodi->fakultas_id = $request->input('fakultas_id');
        $dataprodi->kode_prodi = $request->input('kode_prodi');
        $dataprodi->nama_prodi = $request->input('nama_prodi');
        $dataprodi->jenjang = $request->input('jenjang');
        
        $dataprodi->save();

        return redirect('prodi')->with('status', 'data berhasil ditambahkan');  
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
        //
        $id = Crypt::decrypt($id);
        $datafakultas = Fakultas::all();
        $dataprodi = Prodi::findorFail($id);
        return view('admin.prodi.v_editprodi', compact('dataprodi', 'datafakultas'));
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
        //
        $datafakultas = Fakultas::find($id);
        $dataprodi = Prodi::find($id);

        $dataprodi->fakultas_id = $request->input('fakultas_id');
        $dataprodi->kode_prodi = $request->input('kode_prodi');
        $dataprodi->nama_prodi = $request->input('nama_prodi');
        $dataprodi->jenjang = $request->input('jenjang');
        $dataprodi->save();
        return redirect()->route('prodi.index', compact('datafakultas', 'dataprodi'))->with('status', 'Data Sukses Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $dataprodi = prodi::find($id);
        $dataprodi->delete();
        return redirect('prodi')->with('status', 'Hapus Data Berhasil');
    }
}
