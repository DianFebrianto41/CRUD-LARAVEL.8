@extends('layouts.template')
@section('title', 'Prodi | Dashboard')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
                    <h1 class="m-0">Program Studi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('main-content')
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
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target=".bd-example-modal-lg">
                            <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Prodi
                        </button>
                        {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                        <table id="#" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Fakultas</th>
                                    <th>Kode Prodi</th>
                                    <th>Program Studi</th>
                                    <th>Jenjang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataprodi as $prodi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prodi->fakultas->nama_fakultas }}</td>
                                        <td>{{ $prodi->kode_prodi }}</td>
                                        <td>{{ $prodi->nama_prodi }}</td>
                                        <td>{{ $prodi->jenjang }}</td>
                                        <td>
                                            <form action="{{ route('prodi.destroy', $prodi->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('prodi.edit', Crypt::encrypt($prodi->id)) }}"
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Prodi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prodi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Fakultas</label>
                                    <select name="fakultas_id"
                                        class="form-control @error('fakultas_id') is-invalid @enderror " required>
                                        <option value="">- Pilih -</option>
                                        @foreach ($datafakultas as $fakultas)
                                            <option value="{{ $fakultas->id }}">{{ $fakultas->nama_fakultas }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('fakultas_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="font-weight-bold">Kode Prodi</label>
                                    <input type="text" id="kode_prodi" name="kode_prodi"
                                        class="form-control @error('kode_prodi') is-invalid @enderror" required>
                               

                                @error('kode_prodi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Prodi</label>
                                <input type="text" id="nama_prodi" name="nama_prodi"
                                    class="form-control @error('nama_prodi') is-invalid @enderror" required>
                           

                            @error('nama_prodi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenjang</label>
                            <input type="text" id="jenjang" name="jenjang"
                                class="form-control @error('jenjang') is-invalid @enderror" required>
                       

                        @error('jenjang')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                                {{-- <div class="form-group">
                                    <label for="foto">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
