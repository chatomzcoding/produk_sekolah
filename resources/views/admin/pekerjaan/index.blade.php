@extends('layouts.admin')

@section('title')
    Data Pekerjaan
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Pekerjaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Pekerjaan</li>
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
                    <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Data List Baru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                    <div class="float-right">
                        <a href="{{ url('cetakdata?s=satuanbarang') }}" target="_blank" class="btn btn-outline-info btn-sm  pop-info" title="Cetak Data Satuan Barang"><i class="fas fa-print"></i> CETAK</a>
                        <a href="#" data-toggle="modal" data-target="#info" class="btn btn-outline-info btn-sm  pop-info" title="Informasi"><i class="fas fa-info"></i> INFO</a>
                    </div>
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                  <section class="mb-3">
                      <form action="{{ url($main['link']) }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <select name="jk" id="" class="form-control" onchange="this.form.submit();">
                                    <option value="semua">-- semua jenis kelamin --</option>
                                </select>
                            </div>
                        </div>
                    </form>
                  </section>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Aksi</th>
                                <th>Nama Kegiatan</th>
                                <th>Nama Paket Pekerjaan</th>
                                <th>Alamat</th>
                                <th>Sumber Dana</th>
                                <th>Tahun Anggaran</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($pekerjaan as $item)
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
                                                    <button type="button" data-toggle="modal" data-kode_kegiatan="{{ $item->kode_kegiatan }}" data-kode_tender="{{ $item->kode_tender }}"  data-nama_kegiatan="{{ $item->nama_kegiatan }}"  data-sub_kegiatan="{{ $item->sub_kegiatan }}"  data-nama_paket="{{ $item->nama_paket }}"  data-kecamatan="{{ $item->kecamatan }}"  data-kode_belanja="{{ $item->kode_belanja }}" data-sumber_dana="{{ $item->sumber_dana }}" data-tahun_anggaran="{{ $item->tahun_anggaran }}" data-jenis_pekerjaan="{{ $item->jenis_pekerjaan }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item" data-original-title="Edit Data"><i class="fa fa-edit text-success" style="width: 25px"> </i> EDIT
                                                    </button>
                                                  <div class="dropdown-divider"></div>
                                                  <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item"><i class="fas fa-trash-alt text-danger"style="width: 25px"></i> HAPUS</button>
                                                </div>
                                            </div>
                                    </td>
                                    <td>{{ $item->nama_kegiatan}}</td>
                                    <td>{{ $item->nama_paket}}</td>
                                    <td>{{ $item->kecamatan}}</td>
                                    <td>{{ $item->sumber_dana}}</td>
                                    <td>{{ $item->tahun_anggaran}}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="7" class="font-italic">-- belum ada data --</td>
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
                <h4 class="modal-title">Tambah Data Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Kode Kegiatan {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="kode_kegiatan" id="kode_kegiatan" maxlength="16" value="{{ old('kode_kegiatan') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Kode Tender {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="kode_tender" id="kode_tender" value="{{ old('kode_tender') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Kegiatan {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Sub Kegiatan {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="sub_kegiatan" id="sub_kegiatan" value="{{ old('sub_kegiatan') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Paket {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="nama_paket" id="nama_paket" value="{{ old('nama_paket') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Kecamatan {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <select name="kecamatan" id="kecamatan" class="form-control" required>
                                <option value="">-- pilih kecamatan --</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->nama }}">{{ strtoupper($item->nama) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Kode Belanja {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="kode_belanja" id="kode_belanja" value="{{ old('kode_belanja') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Sumber Dana {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <select name="sumber_dana" id="sumber_dana" class="form-control" required>
                                <option value="">-- pilih sumber dana --</option>
                                @foreach ($sumberdana as $item)
                                    <option value="{{ $item->nama }}">{{ strtoupper($item->keterangan) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Tahun Anggaran {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="tahun_anggaran" id="tahun_anggaran" value="{{ old('tahun_anggaran') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Jenis Pekerjaan {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" required>
                                <option value="">-- pilih jenis pekerjaan --</option>
                                @foreach ($jenispekerjaan as $item)
                                    <option value="{{ $item->nama }}">{{ strtoupper($item->nama) }}</option>
                                @endforeach
                            </select>
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
                        <label for="" class="col-md-4 p-2">NIP {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="nip" id="nip" maxlength="16" value="{{ old('nip') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Jabatan {!! ireq() !!}</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">No SK</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="no_sk" id="no_sk" value="{{ old('no_sk') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Tanggal</label>
                        <div class="col-md-8 p-0">
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Perihal</label>
                        <div class="col-md-8 p-0">
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}" class="form-control">
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
                var nip = button.data('nip')
                var tanggal = button.data('tanggal')
                var jabatan = button.data('jabatan')
                var no_sk = button.data('no_sk')
                var perihal = button.data('perihal')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #nip').val(nip);
                modal.find('.modal-body #tanggal').val(tanggal);
                modal.find('.modal-body #jabatan').val(jabatan);
                modal.find('.modal-body #no_sk').val(no_sk);
                modal.find('.modal-body #perihal').val(perihal);
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

