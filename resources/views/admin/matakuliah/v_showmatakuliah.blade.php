@extends('layouts.template')
@section('title', 'Mata Kuliah | Detail')



@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mata Kuliah</h3>
                          {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
                            <small>
        
                                {{ $dataprodi->nama_prodi }}
        
                            </small>
        
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="150px">Program Studi</th>
                                <td width="30px">:</td>
                                <td>{{ $dataprodi->nama_prodi }}</td>
                            </tr>
                            <tr>
                                <th >Jenjang</th>
                                <td>:</td>
                                <td>{{ $dataprodi->jenjang }}</td>
                            </tr>
                            <tr>
                                <th>Fakultas</th>
                                <td>:</td>
                                <td>{{ $dataprodi->nama_fakultas}}</td>
                            </tr>
                          
                        </table>
                    </div>
                </div>
                <!-- /.card-header -->
                
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button type="button">
                            <a href="{{ route('matakuliah.create') }}" class="btn btn-default btn-sm">
                            <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Prodi</a>
                        </button>
                        {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                        <table id="#" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <tH>No</tH>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Sks</th>
                            <th>Kategori</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datamatkul as $matkul)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                      
                                        <td>{{ $matkul->kode_matkul }}</td>
                                        <td>{{ $matkul->nama_matkul }}</td>
                                        <td>{{ $matkul->sks }}</td>
                                        <td>{{ $matkul->kategori }}</td>
                                        <td>{{ $matkul->smt }}({{ $matkul->ta_id}})</td>
                                        <td>
                                            <form action="{{ route('matakuliah.destroy', $matkul->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('matakuliah.edit', Crypt::encrypt($matkul->id)) }}"
                                                    class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i>
                                                    &nbsp; Edit</a>
                                                <button class="btn btn-danger btn-sm mt-2"><i
                                                        class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $dataprodi->links() }} --}}
                    </div>
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
