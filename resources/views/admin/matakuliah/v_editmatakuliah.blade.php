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

@section('title', 'Mata Kuliah | Edit')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <a href="{{ route('matakuliah.index') }}" class="btn" title="Back to dashboard"><i
                    class="fas fa-arrow-left"></i> Back</a>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Mata Kuliah</h3>
                        
                      </div>

                      
                      
                    <!-- /.card-header -->
                    <form action="{{ route('matakuliah.update', $datamatkul->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        {{ csrf_field() }}
                        @method('PUT')
                        


                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Program Studi</label>
                                <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror " required>
                                    <option value="">- Pilih -</option>
                                    @foreach ($dataprodi as $prodi)
                                        
                                           <option value="{{ $prodi->id }}" {{ old('prodi_id', $datamatkul->prodi_id) == $prodi->id ? 'selected' : null }}>
                                            {{ $prodi->nama_prodi }}
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
                                name="kode_matkul" value="{{ old('kode_matkul', $datamatkul->kode_matkul)  }}" placeholder="Masukan Kode Program Studi"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Mata Kuliah</label>
                            <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror"
                                name="nama_matkul" value="{{ old('nama_matkul', $datamatkul->nama_matkul) }}" placeholder="Masukan Nama Program Studi"
                                required>
                        </div>

                        
                        <div class="form-group">
                            <label class="font-weight-bold">sks</label>
                            <input type="text" class="form-control @error('sks') is-invalid @enderror"
                                name="sks" value="{{ old('sks', $datamatkul->sks) }}" placeholder="Masukan Nama Program Studi"
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
                                <option value="">{{ old('kategori', $datamatkul->kategori) }}</option>
                                <option value="{{ old('kategori', $datamatkul->kategori) }}">Wajib</option>
                                <option value="{{ old('kategori', $datamatkul->kategori) }}">Pilihan</option>
                            </select> 
                    
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Smt</label>
                            <select name="smt" class="form-control @error('smt') is-invalid @enderror " required>
                                <option value="">{{ old('smt', $datamatkul->smt) }}</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">1</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">2</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">3</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">4</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">5</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">6</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">7</option>
                                <option value="{{ old('smt', $datamatkul->smt) }}">8</option>
                            </select> 
                        </div>

                       
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Semester</label>
                            <select name="ta_id" class="form-control @error('ta_id') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                @foreach ($tahunakademik as $ta)
                            
                                       <option value="{{ $ta->id }}" {{ old('ta_id', $datamatkul->ta_id) == $ta->id ? 'selected' : null }}>
                                        {{ $ta->semester }}
                                    </option>
                                @endforeach
                            </select>

                            @error('ta_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>                      


                          
                        <!-- /.card-body -->
        
                        <div class="card-footer justify-content-between">
                          <button type="reset" class="btn btn-warning">Reset</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                      </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <!-- /.container-fluid -->

@endsection
