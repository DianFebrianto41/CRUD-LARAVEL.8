@extends('layouts.template')
@section('title', 'Ruangan | Dashboard')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
                    <h1 class="m-0">Ruangan</h1>
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
                            <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Ruangan
                        </button>
                        {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                        <table id="#" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gedung</th>
                                    <th>Ruangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataruangan as $value => $ruangan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ruangan->gedung->nama_gedung }}</td>
                                        <td>{{ $ruangan->nama_ruangan }}</td>
                                        <td>
                                            <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('ruangan.edit', Crypt::encrypt($ruangan->id)) }}"
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
                    <form action="{{ route('ruangan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Gedung</label>
                                    <select name="gedung_id" class="form-control @error('gedung_id') is-invalid @enderror "
                                        required>
                                        <option value="">- Pilih -</option>
                                        @foreach ($datagedung as $gedung)
                                            <option value="{{ $gedung->id }}">{{ $gedung->nama_gedung }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('gedung_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Ruangan</label>
                                    <input type="text" id="nama_ruangan" name="nama_ruangan"
                                        class="form-control @error('ruangan') is-invalid @enderror" required>


                                    @error('nama_ruangan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
