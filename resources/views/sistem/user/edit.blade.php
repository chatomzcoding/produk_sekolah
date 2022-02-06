@extends('layouts.admin')
@section('title')
    Pengaturan Akun
@endsection
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Pengaturan Akun</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title">Form Pengaturan Akun</h3>
                {{-- <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah User Baru </a> --}}
                {{-- <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Hapus Data Terpilih</a> --}}
                {{-- <a href="{{ url('/artikel')}}" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-print"></i> Kembali ke artikel</a> --}}
            </div>
            <div class="card-body">
                @include('sistem.notifikasi')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <section class="container">
                    <form action="{{ url('/user/'.$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="level" value="{{ $user->level}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group p-2">
                                    <label for="">Nama Lengkap <strong class="text-danger">*</strong></label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ $user->name}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group p-2">
                                    <label for="">Email <strong class="text-danger">*</strong></label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ $user->email}}" class="form-control" required>
                                    <small class="font-italic">email digunakan untuk login ke sistem</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <section class="container">
                                    @if (is_null($user->photo))
                                        <img src="{{ asset('/img/avatar.png')}}" alt="" class="img-fluid">
                                        <small>Photo default</small>
                                    @else
                                        <img src="{{ asset('/img/user/'.$user->photo)}}" alt="" class="img-fluid">
                                    @endif
                                </section>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Upload Photo untuk melakukan perubahan pada photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-success">
                                    <p>Abaikan Form Password jika tidak ingin dirubah</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-2">
                                    <label for="">Password</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="******" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group p-2">
                                    <label for="">Ulangi Password</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" placeholder="******" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <hr>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection