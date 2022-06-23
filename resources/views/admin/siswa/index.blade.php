<x-admin-layout title="data siswa" menu="siswa">
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Siswa</li>
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
                        <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Data Siswa" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</a>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Aksi</th>
                                    <th>Nama Siswa</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Kekhususan</th>
                                </tr>
                            </thead>
                            <tbody class="text-capitalize">
                                @forelse ($siswa as $item)
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
                                                        <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-jk="{{ $item->jk }}"  data-alamat="{{ $item->alamat }}" data-kelas="{{ $item->kelas }}" data-kekhususan="{{ $item->kekhususan }}" data-id="{{ $item->id }}" data-target="#ubah" title="" class="dropdown-item" data-original-title="Edit Data"><i class="fa fa-edit text-success" style="width: 25px"> </i> EDIT
                                                        </button>
                                                      <div class="dropdown-divider"></div>
                                                      <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item"><i class="fas fa-trash-alt text-danger"style="width: 25px"></i> HAPUS</button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $item->nama}}</td>
                                        <td>{{ $item->alamat}}</td>
                                        <td>{{ $item->jk}}</td>
                                        <td>{{ $item->kelas}}</td>
                                        <td>{{ $item->kekhususan}}</td>
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
                <form action="{{ url($main['link'])}}" method="post">
                    @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Nama Siswa</label>
                                    <input id="nama" name="nama" type="text" class="form-control col-md-8" value="{{ old('nama')}}"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control col-md-8">
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->nama_kelas}}">{{ strtoupper($item->nama_kelas)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Jenis Kelamin</label>
                                    <div class="col-md-8">
                                        <input type="radio" name="jk" value="laki-laki" checked> Laki laki 
                                        <input type="radio" name="jk" value="perempuan"> Perempuan 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Kekhususan</label>
                                        <select name="kekhususan" id="kekhususan" class="form-control col-md-8">
                                            @foreach (kekhususan() as $item)
                                                <option value="{{ $item}}">{{ $item}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Alamat Siswa</label>
                                    <textarea name="alamat" id="alamat" class="form-control col-md-8" cols="30" rows="4"></textarea>
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
                <form action="{{ route($main['link'].'.update','test')}}" method="post">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Data Siswa</h4>
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
                                    <label class="col-md-4">Nama Siswa</label>
                                    <input id="nama" name="nama" type="text" class="form-control col-md-8" value="{{ old('nama')}}"  required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control col-md-8">
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->nama_kelas}}">{{ strtoupper($item->nama_kelas)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Jenis Kelamin</label>
                                    <div class="col-md-8">
                                        <input type="radio" name="jk" value="laki-laki" checked> Laki laki 
                                        <input type="radio" name="jk" value="perempuan"> Perempuan 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Kekhususan</label>
                                        <select name="kekhususan" id="kekhususan" class="form-control col-md-8">
                                            @foreach (kekhususan() as $item)
                                                <option value="{{ $item}}">{{ $item}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Alamat Siswa</label>
                                    <textarea name="alamat" id="alamat" class="form-control col-md-8" cols="30" rows="4"></textarea>
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
                var jk = button.data('jk')
                var kelas = button.data('kelas')
                var alamat = button.data('alamat')
                var kekhususan = button.data('kekhususan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #jk').val(jk);
                modal.find('.modal-body #kelas').val(kelas);
                modal.find('.modal-body #alamat').val(alamat);
                modal.find('.modal-body #kekhususan').val(kekhususan);
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