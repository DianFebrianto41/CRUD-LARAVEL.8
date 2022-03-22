<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Tahunakademik;
use App\Models\Matakuliah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;


class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->Prodi = new Prodi();
        $this->Matakuliah = new Matakuliah();   
   
    }
    public function index()
    {
        //
        $datafakultas = Fakultas::All();
        $dataprodi = Prodi::all();
        return view('admin.matakuliah.index', compact('dataprodi', 'datafakultas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tahunakademik = Tahunakademik::All();
        $datamatkul = Matakuliah::All();
        $dataprodi = Prodi::All();
        return view('admin.matakuliah.v_creatematakuliah', compact('datamatkul', 'dataprodi', 'tahunakademik'));
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
        $tahunakademik = new Tahunakademik();
        $dataprodi = new Prodi();
        $datamatkul = new Matakuliah();
        
        $datamatkul->kode_matkul = $request->input('kode_matkul');
        $datamatkul->nama_matkul = $request->input('nama_matkul');
        $datamatkul->sks = $request->input('sks');
        $datamatkul->kategori = $request->input('kategori');
        $datamatkul->smt = $request->input('smt');
        $datamatkul->prodi_id = $request->input('prodi_id');
        $datamatkul->ta_id = $request->input('ta_id');
    
        
        $datamatkul->save();

        return redirect('matakuliah')->with('status', 'data berhasil ditambahkan');  
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
        $id = Crypt::decrypt($id);
        $data = [
            'dataprodi' => $this->Prodi->detailData($id),
            'datamatkul' => $this->Matakuliah->allMatkul($id)
        ];

        return view('admin.matakuliah.v_showmatakuliah', $data );
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
        $tahunakademik = Tahunakademik::All();
        $dataprodi = Prodi::All();
        $datamatkul = Matakuliah::findOrfail($id);
        return view('admin.matakuliah.v_editmatakuliah', compact('tahunakademik', 'dataprodi', 'datamatkul'));
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

        $tahunakademik = Tahunakademik::All();
        $dataprodi = Prodi::All();
        $datamatkul = Matakuliah::find($id);
 
        $datamatkul->kode_matkul = $request->input('kode_matkul');
        $datamatkul->nama_matkul = $request->input('nama_matkul');
        $datamatkul->sks = $request->input('sks');
        $datamatkul->kategori = $request->input('kategori');
        $datamatkul->smt = $request->input('smt');
        $datamatkul->prodi_id = $request->input('prodi_id');
        $datamatkul->ta_id = $request->input('ta_id');
    
        $datamatkul->save();
        return redirect()->route('matakuliah.index', compact('dataruangan', 'datagedung'))->with('status', 'Data Sukses Diupdate!');
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
        $datamatkul = Matakuliah::find($id);
        $datamatkul->delete();
        return redirect('Matakuliah')->with('status', 'Hapus Data Berhasil');
    }
}
