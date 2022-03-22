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

@section('title', 'Fakultas | Edit')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <a href="{{ route('fakultas.index') }}" class="btn" title="Back to dashboard"><i
                    class="fas fa-arrow-left"></i> Back</a>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Fakultas</h3>
                        
                      </div>

                      
                      
                    <!-- /.card-header -->
                    <form action="{{ route('fakultas.update', $datafakultas->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        {{ csrf_field() }}
                        @method('PUT')
                        


                        <div class="card-body">
                          <div class="form-group">
                            <label class="font-weight-bold">Nama Fakultas</label>
                            <input type="text" class="form-control @error('nama_fakultas') is-invalid @enderror" name="nama_fakultas"
                            value="{{ old('nama_fakultas', $datafakultas->nama_fakultas) }}">
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
