<x-admin-layout title="Data Fasilitas" menu="fasilitas">
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Data Fasilitas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Fasilitas</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                        <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Data Guru" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Fasilitas</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th>Gambar</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Nama Alias</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($fasilitas as $item)
                                <tr>
                                        <td class="text-center">{{ $loop->iteration}}</td>
                                        <td class="text-center">
                                            <form id="data-{{ $item->id }}" action="{{url('fasilitas/'.$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                </form>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm btn-flat">Aksi</button>
                                                    <button type="button" class="btn btn-info btn-sm btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-alias="{{ $item->alias }}"  data-tahun="{{ $item->tahun }}"  data-kategori="{{ $item->kategori }}" data-keterangan="{{ $item->keterangan }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item" data-original-title="Edit Data"><i class="fa fa-edit text-success" style="width: 25px"> </i> EDIT
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item"><i class="fas fa-trash-alt text-danger"style="width: 25px"></i> HAPUS</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td><img src="{{ asset('img/fasilitas/'.$item->gambar)}}" alt="" width="100px"></td>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{ $item->alias}}</td>
                                        <td>{{ $item->tahun}}</td>
                                        <td>{{ $item->kategori}}</td>
                                        <td>{{ $item->keterangan}}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5" class="font-italic">-- belum ada data --</td>
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
                <form action="{{ url('fasilitas')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Nama Fasilitas</label>
                                    <input id="nama" name="nama" type="text" class="form-control col-md-8" value="{{ old('nama')}}"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Nama Alias</label>
                                    <input id="alias" name="alias" type="text" class="form-control col-md-8" value="{{ old('alias')}}"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Tahun Pembuatan</label>
                                    <select name="tahun" id="tahun" class="form-control col-md-8">
                                        @for ($i = 1990; $i < ambil_tahun(); $i++)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control col-md-8">
                                        @foreach (kategorifasilitas() as $item)
                                            <option value="{{ $item}}">{{ $item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Gambar Fasilitas</label>
                                    <input id="gambar" name="gambar" type="file" class="form-control col-md-8"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control col-md-8" cols="30" rows="4"></textarea>
                                </div>
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
        
        <div class="modal fade" id="ubah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route('fasilitas.update','test')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Data Mata Pelajaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Nama Fasilitas</label>
                                    <input id="nama" name="nama" type="text" class="form-control col-md-8" value="{{ old('nama')}}"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Nama Alias</label>
                                    <input id="alias" name="alias" type="text" class="form-control col-md-8" value="{{ old('alias')}}"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Tahun Pembuatan</label>
                                    <select name="tahun" id="tahun" class="form-control col-md-8">
                                        @for ($i = 1990; $i < ambil_tahun(); $i++)
                                            <option value="{{ $i}}">{{ $i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control col-md-8">
                                        @foreach (kategorifasilitas() as $item)
                                            <option value="{{ $item}}">{{ $item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control col-md-8" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Gambar</label>
                                    <div class="col-md-8 p-0">
                                        <input id="gambar" name="gambar" type="file" class="form-control">
                                        <span class="text-danger font-italic">(abaikan jika tidak ingin merubah gambar</span>
                                    </div>
                                </div>
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
    </x-slot>
    <x-slot name="kodejs">
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var alias = button.data('alias')
                var tahun = button.data('tahun')
                var keterangan = button.data('keterangan')
                var kategori = button.data('kategori')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #alias').val(alias);
                modal.find('.modal-body #tahun').val(tahun);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #kategori').val(kategori);
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
    </x-slot>
</x-admin-layout>