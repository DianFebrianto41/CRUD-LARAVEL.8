@extends('layouts.template')

@section('title', 'Dashboard')

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h1><b>Selamat datang di Sistem Informasi Akademik</b></h1>
        </div>
    </div>
    <img class="img-fluid mb-3" src="{{ URL::asset('dist/img/photo2.png') }}" style="width: 100%"
        alt="Photo">
</div>    
@endsection
 