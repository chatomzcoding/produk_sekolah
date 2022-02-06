@extends('layouts.admin')
@section('title')
    User - Data User
@endsection
@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Data User</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
        <li class="breadcrumb-item active">Daftar User</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- start col --}}
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Info Statistik</span>
                  <span class="info-box-number">
                        {{-- {{ $main['statistik']['total-siswa']}} --}}
                  </span>
                </div>
              </div>
            </div>
            {{-- end col --}}
            {{-- start col --}}
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Info Statistik</span>
                  <span class="info-box-number">
                        {{-- {{ $main['statistik']['total-l']}} --}}
                  </span>
                </div>
              </div>
            </div>
            {{-- end col --}}
            {{-- start col --}}
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Info Statistik</span>
                  <span class="info-box-number">
                        {{-- {{ $main['statistik']['total-p']}} --}}
                  </span>
                </div>
              </div>
            </div>
            {{-- end col --}}
            {{-- start col --}}
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Info Statistik</span>
                  <span class="info-box-number">
                        {{-- {{ $main['statistik']['total-aktif']}} --}}
                  </span>
                </div>
              </div>
            </div>
            {{-- end col --}}
        </div>
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah User Baru </a>
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
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Aksi</th>
                                <th>Photo</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($user as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url('/adminuser',$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        <button type="button" data-toggle="modal" data-name="{{ $item->name }}" data-email="{{ $item->email }}" data-level="{{ $item->level }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="btn btn-success btn-sm" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="deleteRow( {{ $item->id }} )" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td><img src="{{ asset('/img/user/'.$item->profile_photo_path)}}" alt="{{ $item->profile_photo_path}}" width="100px"></td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>{{ $item->level}}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">tidak ada data</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal tambah --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ url('/adminuser')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama </label>
                        <input type="text" name="name" id="name" class="form-control col-md-8" placeholder="Nama User" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">email</label>
                        <input type="text" name="email" id="email" class="form-control col-md-8" placeholder="Alamat Email" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Level</label>
                        <select name="level" id="level" class="form-control col-md-8">
                            @foreach (list_leveluser() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control col-md-8" placeholder="********" required  autocomplete="off">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Ulangi Password</label>
                        <input type="password" name="password_confirmation" id="password" class="form-control col-md-8" placeholder="********" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Photo</label>
                        <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control col-md-8" required>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->

    {{-- modal edit --}}
    <div class="modal fade" id="ubah">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('user.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama </label>
                        <input type="text" name="name" id="name" class="form-control col-md-8" placeholder="Nama User" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">email</label>
                        <input type="text" name="email" id="email" class="form-control col-md-8" placeholder="Alamat Email" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Level</label>
                        <select name="level" id="level" class="form-control col-md-8">
                            @foreach (list_leveluser() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control col-md-8" autocomplete="off">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Ulangi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control col-md-8">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Photo (jika ingin diubah)</label>
                        <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control col-md-8">
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-pen"></i> SIMPAN PERUBAHAN</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection


    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var name = button.data('name')
                var level = button.data('level')
                var email = button.data('email')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #level').val(level);
                modal.find('.modal-body #email').val(email);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            });
        </script>
    @endsection
