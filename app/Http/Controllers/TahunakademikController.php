<?php

namespace App\Http\Controllers;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class TahunakademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tahunakademik = Tahunakademik::All();
        return view('admin.tahunakademik.index', compact('tahunakademik'));
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
        $tahunakademik = New Tahunakademik;

        $tahunakademik->tahun_akademik = $request->input('tahun_akademik');
        $tahunakademik->semester = $request->input('semester');

        $tahunakademik->save();
        return redirect()->route('tahunakademik.index')->with('status', 'data berhasil ditambahkan');
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
        $tahunakademik = Tahunakademik::findorFail($id);
        return view('admin.tahunakademik.v_edittahunakademik', compact('tahunakademik'));
    }

    /**
     * Update the specified resource in storage,.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $tahunakademik = Tahunakademik::find($id);

        $tahunakademik->tahun_akademik = $request->input('tahun_akademik');
        $tahunakademik->semester = $request->input('semester');
        $tahunakademik->save();
        return redirect()->route('tahunakademik.index', compact('tahunakademik'))->with('status', 'Data Sukses Diupdate!');

        
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
        $tahunakademik = Tahunakademik::find($id);
        $tahunakademik->delete();
        return redirect('tahunakademik')->with('status', 'Hapus Data Berhasil');
    }
}
