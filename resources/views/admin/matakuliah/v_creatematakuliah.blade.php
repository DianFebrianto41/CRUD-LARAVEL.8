@extends('layouts.template')
{{-- @section('content-header') 
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
          <h1 class="m-0">Fakultas</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection --}}

@section('title', 'Tahun Akademik | Create')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
                    <h1 class="m-0">Tambah Data Mata kuliah</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main-content')
<div class="container">

      

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="col-md-3 mt-2">
                    {{-- <a href="{{ route('matakuliah.show') }}" class="btn btn-success" title="Kembali"><i
                            class="fas fa-arrow-left"></i> Kembali</a> --}}
                </div>
                <div class="card-body">
                    <form autocomplete="off" action="{{ route('matakuliah.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Program Studi</label>
                            <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                @foreach ($dataprodi as $prodi)
                                    <option value="{{ $prodi->id }}"
                                       >{{ $prodi->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>

                            @error('prodi_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        
                        <div class="form-group">
                            <label class="font-weight-bold">Kode Matkul </label>
                            <input type="text" class="form-control @error('kode_matkul') is-invalid @enderror"
                                name="kode_matkul" value="{{ old('kode_matkul') }}" placeholder="Masukan Kode Program Studi"
                                required>

                            @error('kode_matkul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Mata Kuliah</label>
                            <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror"
                                name="nama_matkul" value="{{ old('nama_matkul') }}" placeholder="Masukan Nama Program Studi"
                                required>

                            @error('nama_matkul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label class="font-weight-bold">sks</label>
                            <input type="text" class="form-control @error('sks') is-invalid @enderror"
                                name="sks" value="{{ old('sks') }}" placeholder="Masukan Nama Program Studi"
                                required>

                            @error('sks')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                <option value="Wajb">Wajib</option>
                                <option value="Pilihan">Pilihan</option>
                            </select> 
                    
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Smt</label>
                            <select name="smt" class="form-control @error('smt') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select> 
                        </div>

                       
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Semester</label>
                            <select name="ta_id" class="form-control @error('ta_id') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                @foreach ($tahunakademik as $ta)
                                    <option value="{{ $ta->id }}"
                                       >{{ $ta->semester }}
                                    </option>
                                @endforeach
                            </select>

                            @error('ta_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                      
                        {{-- <div class="form-group">
                            <label class="font-weight-bold">Jenjang</label>
                            <select name="jenjang" class="form-control @error('jenjang') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                <option value="S1">S1</option>
                            </select> 
                        </div> --}}
                        
                        

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
CKEDITOR.replace('alamat');
</script> --}}
@endsection
