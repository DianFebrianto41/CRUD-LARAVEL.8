<?php

namespace App\Http\Controllers;


use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;


class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datafakultas = Fakultas::orderBy('id', 'asc')->paginate(5);
        return view('admin.fakultas.index', compact('datafakultas'));
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
        $datafakultas->nama_fakultas = $request->input('nama_fakultas');

        $datafakultas->save();
        return redirect('fakultas')->with('status', 'data berhasil ditambahkan');
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
        $datafakultas = Fakultas::findorFail($id);
        return view('admin.fakultas.v_editfakultas', compact('datafakultas'));

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

        $datafakultas->nama_fakultas = $request->input('nama_fakultas');
        $datafakultas->save();
        return redirect()->route('fakultas.index', compact('datafakultas'))->with('status', 'Data Sukses Diupdate!');
    
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
        $datafakultas = Fakultas::find($id);
        $datafakultas->delete();
        return redirect('fakultas')->with('status', 'Hapus Data Berhasil');
    }
}
