@extends('layouts.template')

@section('title', 'Ruangan | Create')

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
                    <form action="{{ route('ruangan.update', $dataruangan->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="card-body">
                        <label class="font-weight-bold">Gedung</label>
                        <select name="gedung_id" class="form-control @error('gedung_id') is-invalid @enderror " required>
                            <option value="">- Pilih -</option>
                            @foreach ($datagedung as $gedung)
                                <option value="{{ $gedung->id }}" {{ old('gedung_id', $dataruangan->gedung_id) == $gedung->id ? 'selected' : null }}>
                                  {{ $gedung->nama_gedung }}
                                </option>
                            @endforeach
                        </select>
                  
                          <div class="form-group">
                            <label class="font-weight-bold">Nama Ruangan</label>
                            <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan"
                            value="{{ old('nama_ruangan', $dataruangan->nama_ruangan) }}">
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
