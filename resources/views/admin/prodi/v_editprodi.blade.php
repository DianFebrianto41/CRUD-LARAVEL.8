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

@section('title', 'Prodi | Edit')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <a href="{{ route('prodi.index') }}" class="btn" title="Back to dashboard"><i
                    class="fas fa-arrow-left"></i> Back</a>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Program Studi</h3>
                        
                      </div>                     
                    <!-- /.card-header -->
                    <form action="{{ route('prodi.update', $dataprodi->id) }}"
                        method="POST" enctype="multipart/form-data">

                        @csrf

                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Fakultas</label>
                            <select name="fakultas_id" class="form-control @error('fakultas_id') is-invalid @enderror " required>
                                <option value="">- Pilih -</option>
                                @foreach ($datafakultas as $fakultas)
                                    <option value="{{ $fakultas->id }}" {{ old('fakultas_id', $dataprodi->fakultas_id) == $fakultas->id ? 'selected' : null }}>
                                      {{ $fakultas->nama_fakultas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>   
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Kode Prodi</label>
                            <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" name="kode_prodi"
                            value="{{ old('kode_prodi', $dataprodi->kode_prodi) }}">
                          </div>

                          <div class="form-group">
                            <label class="font-weight-bold">Nama Prodi</label>
                            <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" name="nama_prodi"
                            value="{{ old('nama_prodi', $dataprodi->nama_prodi) }}">
                          </div>

                          <div class="form-group">
                            <label class="font-weight-bold">Jenjang</label>
                            <input type="text" class="form-control @error('jenjang') is-invalid @enderror" name="jenjang"
                            value="{{ old('jenjang', $dataprodi->jenjang) }}">
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
