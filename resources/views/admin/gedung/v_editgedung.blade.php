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

@section('title', 'Gedung | Edit')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <a href="{{ route('fakultas.index') }}" class="btn" title="Back to dashboard"><i
                    class="fas fa-arrow-left"></i> Back</a>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Gedung</h3>
                        
                      </div>
                      
                    <!-- /.card-header -->
                    <form action="{{ route('gedung.update', $datagedung->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        {{ csrf_field() }}
                        @method('PUT')
                        


                        <div class="card-body">
                          <div class="form-group">
                            <label class="font-weight-bold">Nama Gedung</label>
                            <input type="text" class="form-control @error('nama_gedung') is-invalid @enderror" name="nama_gedung"
                            value="{{ old('nama_gedung', $datagedung->nama_gedung) }}">
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
