@extends('layouts.admin')

@section('title')
    Data Profil
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Profil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Informasi Profil</li>
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
                    <form action="{{ url($main['link'].'/'.$profil->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="" class="col-md-4">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" value="{{ $profil->nama_sekolah }}" class="col-md-8 form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tentang Sekolah</label>
                            <textarea name="tentang" id="tentang" cols="30" rows="5" required>{{ $profil->tentang }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Sejarah</label>
                            <textarea name="sejarah" id="sejarah" cols="30" rows="5" required>{{ $profil->sejarah }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">VISI</label>
                            <textarea name="visi" id="visi" cols="30" rows="5" required>{{ $profil->visi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">MISI</label>
                            <textarea name="misi" id="misi" cols="30" rows="5" required>{{ $profil->misi }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{ asset('img/'.$profil->gambar) }}" alt="" height="200px" width="auto">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Gambar (upload untuk mengubah)</label>
                                                    <input type="file" name="gambar" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{ asset('img/'.$profil->logo) }}" alt="" height="200px" width="auto">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Logo (upload untuk mengubah)</label>
                                                    <input type="file" name="logo" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                        </div>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace('sejarah', {
                            width: '100%',
                            height: 250
                            });
                            CKEDITOR.replace('tentang', {
                            width: '100%',
                            height: 250
                            });
                            CKEDITOR.replace('visi', {
                            width: '100%',
                            height: 250
                            });
                            CKEDITOR.replace('misi', {
                            width: '100%',
                            height: 250
                            });
                        </script>
                    </form>
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

