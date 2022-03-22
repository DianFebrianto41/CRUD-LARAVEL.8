@extends('layouts.template')
@section('title', 'Tahun Akademik | Dashboard')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
                    <h1 class="m-0">Tahun Akademik</h1>
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
                            <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Tahun Akademik
                        </button>
                        {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                        <table id="#" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Akademik</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahunakademik as $value => $ta)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ta->tahun_akademik }}</td>
                                        <td>{{ $ta->semester}}</td>
                                        <td>
                                            <form action="{{ route('tahunakademik.destroy', $ta->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('tahunakademik.edit', Crypt::encrypt($ta->id)) }}"
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
                        {{-- {{ $dataruangan->links() }} --}}
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
                    <h4 class="modal-title">Tambah Data Ruangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tahunakademik.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tahun Akademik</label>
                                    <input type="text" id="tahun_akademik" name="tahun_akademik"
                                        class="form-control @error('tahun_akademik') is-invalid @enderror" placeholder="Ex 2018/2019" required>


                                    @error('tahun_akademik')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Semester</label>
                                    <select name="semester" class="form-control @error('semester') is-invalid @enderror " required>
                                        <option value="">- Pilih -</option>
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                </div>

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
