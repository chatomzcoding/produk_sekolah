@extends('layouts.admin')

@section('title')
    Data Guru
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Guru</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Guru</li>
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
                    <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Data Guru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                    <div class="float-right">
                        {{-- <a href="{{ url('cetakdata?s=satuanbarang') }}" target="_blank" class="btn btn-outline-info btn-sm  pop-info" title="Cetak Data Satuan Barang"><i class="fas fa-print"></i> CETAK</a> --}}
                        <a href="#" data-toggle="modal" data-target="#info" class="btn btn-outline-info btn-sm  pop-info" title="Informasi"><i class="fas fa-info"></i> INFO</a>
                    </div>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  {{-- <section class="mb-3">
                      <form action="{{ url($main['link']) }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="jk" id="" class="form-control" onchange="this.form.submit();">
                                    <option value="semua">-- semua jenis kelamin --</option>
                                </select>
                            </div>
                        </div>
                    </form>
                  </section> --}}
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Poto</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($guru as $item)
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td class="text-center">
                                        <form id="data-{{ $item->id }}" action="{{url($main['link'].'/'.$item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            </form>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-jk="{{ $item->jk }}"  data-alamat="{{ $item->alamat }}"  data-gelar="{{ $item->gelar }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item" data-original-title="Edit Data"><i class="fa fa-edit text-success" style="width: 25px"> </i> EDIT
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item"><i class="fas fa-trash-alt text-danger"style="width: 25px"></i> HAPUS</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>poto</td>
                                    <td>{{ $item->nama.' '.$item->gelar}}</td>
                                    <td>{{ $item->alamat}}</td>
                                    <td>{{ $item->jk}}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6" class="font-italic">-- belum ada data --</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="tambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ url($main['link'])}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Guru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Guru {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="nama" id="nama" maxlength="16" value="{{ old('nama') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Gelar</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="gelar" id="gelar" value="{{ old('gelar') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Alamat {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Jenis Kelamin {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <select name="jk" id="jk" class="form-control" required>
                                <option value="">-- pilih jenis kelamin --</option>
                                    <option value="laki-laki">LAKI - LAKI</option>
                                    <option value="perempuan">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Poto (opsional)</label>
                        <div class="col-md-8 p-0">
                            <input type="file" name="poto" class="form-control">
                        </div>
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
            <form action="{{ route($main['link'].'.update','test')}}" method="post">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Data Pekerjaan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Guru {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="nama" id="nama" maxlength="16" value="{{ old('nama') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Gelar</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="gelar" id="gelar" value="{{ old('gelar') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Alamat {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Jenis Kelamin {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <select name="jk" id="jk" class="form-control" required>
                                <option value="">-- pilih jenis kelamin --</option>
                                    <option value="laki-laki">LAKI - LAKI</option>
                                    <option value="perempuan">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Poto (opsional)</label>
                        <div class="col-md-8 p-0">
                            <input type="file" name="poto" class="form-control">
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- /.modal -->

    {{-- modal info --}}
    <div class="modal fade" id="info">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">INFORMASI</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                   ini contoh info
                </section>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
        </div>
    </div>
    <!-- /.modal -->

    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var jk = button.data('jk')
                var gelar = button.data('gelar')
                var alamat = button.data('alamat')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #jk').val(jk);
                modal.find('.modal-body #gelar').val(gelar);
                modal.find('.modal-body #alamat').val(alamat);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy","excel"]
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

    @endsection

