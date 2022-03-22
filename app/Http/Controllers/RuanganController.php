<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Gedung;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datagedung = Gedung::All();
       $dataruangan = Ruangan::All();
        return view('admin.ruangan.index', compact('dataruangan', 'datagedung'));
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

        $datagedung = new Gedung();
        $dataruangan = new Ruangan();
        $dataruangan->gedung_id = $request->input('gedung_id');
        $dataruangan->nama_ruangan = $request->input('nama_ruangan');

        $dataruangan->save();
        return redirect('ruangan')->with('status', 'data berhasil ditambahkan');

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
        $datagedung = Gedung::all();
        $dataruangan = ruangan::findorFail($id);
        return view('admin.ruangan.v_editruangan', compact('dataruangan', 'datagedung'));
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
        $datagedung = Gedung::all();
        $dataruangan = Ruangan::find($id);
        $dataruangan->gedung_id = $request->input('gedung_id');
        $dataruangan->nama_ruangan = $request->input('nama_ruangan');

        $dataruangan->save();
        return redirect()->route('ruangan.index', compact('dataruangan', 'datagedung'))->with('status', 'Data Sukses Diupdate!');

        
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

        $dataruangan = Ruangan::find($id);
        $dataruangan->delete();
        return redirect('ruangan')->with('status', 'Hapus Data Berhasil');
    }
}
