<x-admin-layout title="Data LMS" menu="lms">
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Data Learning Management System</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">LMS {{ $lms->mapel->nama_mapel }}</li>
            </ol>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ url('lms') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-angle-left"></i> Kembali</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">MATERI</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">TUGAS</a>
                                    {{-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a> --}}
                                    {{-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}
                                  </div>
                                </div>
                                <div class="col-9">
                                  <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <section>
                                            <a href="#" class="btn btn-outline-primary btn-sm pop-info" title="Tambah Data Siswa" data-toggle="modal" data-target="#tambahmateri"><i class="fas fa-plus"></i> Tambah Materi</a>
                                            <div class="table-responsive mt-2">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="10%">Aksi</th>
                                                            <th>Nama Materi</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-capitalize">
                                                        @forelse ($materifile as $item)
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
                                                                            {{-- <a href="{{ url('lms/'.$item->id) }}" class="dropdown-item"><i class="fas fa-file text-primary"style="width: 25px"></i> DETAIL</a> --}}
                                                                            <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-id="{{ $item->id }}" data-target="#ubahmateri" title="" class="dropdown-item" data-original-title="Edit Data"><i class="fa fa-edit text-success" style="width: 25px"> </i> EDIT
                                                                            </button>
                                                                        <div class="dropdown-divider"></div>
                                                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item"><i class="fas fa-trash-alt text-danger"style="width: 25px"></i> HAPUS</button>
                                                                        </div>
                                                                    </div>
                                                            </td>
                                                            <td>{{ $item->nama}}</td>
                                                            <td><a href="{{ asset('lms/file/'.$item->file) }}" class="btn btn-info btn-sm btn-block" target="_blank">lihat materi</a></td>
                                                        </tr>
                                                        @empty
                                                            <tr class="text-center">
                                                                <td colspan="4" class="font-italic">-- belum ada data --</td>
                                                            </tr>
                                                        @endforelse
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <section>
                                            <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambahtugas"><i class="fas fa-plus"></i> Tambah Tugas</a>
                                            <div class="table-responsive mt-2">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="10%">Aksi</th>
                                                            <th>Nama Tugas</th>
                                                            <th>Rincian</th>
                                                            <th>link Tugas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-capitalize">
                                                        @forelse ($tugas as $item)
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
                                                                            {{-- <a href="{{ url('lms/'.$item->id) }}" class="dropdown-item"><i class="fas fa-file text-primary"style="width: 25px"></i> DETAIL</a> --}}
                                                                            <button type="button" data-toggle="modal" data-nama="{{ $item->nama }}" data-rincian="{{ $item->rincian }}" data-link="{{ $item->link }}" data-id="{{ $item->id }}" data-target="#ubahtugas" title="" class="dropdown-item" data-original-title="Edit Data"><i class="fa fa-edit text-success" style="width: 25px"> </i> EDIT
                                                                            </button>
                                                                        <div class="dropdown-divider"></div>
                                                                        <button onclick="deleteRow( {{ $item->id }} )" class="dropdown-item"><i class="fas fa-trash-alt text-danger"style="width: 25px"></i> HAPUS</button>
                                                                        </div>
                                                                    </div>
                                                            </td>
                                                            <td>{{ $item->nama}}</td>
                                                            <td>{{ $item->rincian}}</td>
                                                            <td>
                                                                @if (is_null($item->link))
                                                                    tidak ada link
                                                                @else
                                                                    <a href="{{ $item->link}}" target="_blank">link tugas</a>
                                                                @endif
                                                                </td>
                                                        </tr>
                                                        @empty
                                                            <tr class="text-center">
                                                                <td colspan="4" class="font-italic">-- belum ada data --</td>
                                                            </tr>
                                                        @endforelse
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> --}}
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- materi --}}
        <div class="modal fade" id="tambahmateri">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ url($main['link'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="sesi" value="materi">
                    <input type="hidden" name="lms_id" value="{{ $lms->id }}">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Mata Materi</label>
                                    <input type="text" name="nama" id="nama" class="form-control col-md-8">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">File Materi</label>
                                    <div class="col-md-8">
                                        <input type="file" name="file" id="file" class="from-control" required> <br>
                                        <small class="text-danger">saat ini materi file berformat PDF</small>
                                    </div>
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
        <div class="modal fade" id="ubahmateri">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route($main['link'].'.update','test')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Data materi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="sesi" value="materi">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Mata Materi</label>
                                    <input type="text" name="nama" id="nama" class="form-control col-md-8">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">File Materi</label>
                                    <div class="col-md-8">
                                        <input type="file" name="file" id="file" class="from-control"> <br>
                                        <small class="text-danger">saat ini materi file berformat PDF <br>upload jika ingin merubah materi</small>
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
        {{-- materi --}}
        <div class="modal fade" id="tambahtugas">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ url($main['link'])}}" method="post">
                    @csrf
                    <input type="hidden" name="sesi" value="tugas">
                    <input type="hidden" name="lms_id" value="{{ $lms->id }}">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Tugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Mata Tugas</label>
                                    <input type="text" name="nama" id="nama" class="form-control col-md-8">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Link Tugas (opsional)</label>
                                    <input type="url" name="link" id="link" class="form-control col-md-8">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Rincian Tugas</label>
                                    <textarea name="rincian" id="rincian" cols="30" rows="4" class="form-control col-md-8" required></textarea>
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
        <div class="modal fade" id="ubahtugas">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route($main['link'].'.update','test')}}" method="post">
                    @csrf
                    @method('patch')
                <div class="modal-header">
                <h4 class="modal-title">Edit Data Tugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body p-3">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="sesi" value="tugas">
                    <section class="p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Mata Tugas</label>
                                    <input type="text" name="nama" id="nama" class="form-control col-md-8">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Link Tugas (opsional)</label>
                                    <input type="url" name="link" id="link" class="form-control col-md-8">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-4">Rincian Tugas</label>
                                    <textarea name="rincian" id="rincian" cols="30" rows="4" class="form-control col-md-8" required></textarea>
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
            $('#ubahmateri').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #id').val(id);
            })
        </script>
        <script>
            $('#ubahtugas').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var rincian = button.data('rincian')
                var link = button.data('link')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #rincian').val(rincian);
                modal.find('.modal-body #link').val(link);
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