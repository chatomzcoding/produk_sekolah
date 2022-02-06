@section('title')
    Admin - Data Info Website
@endsection
<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Info Website</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Data Info</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Daftar Unit</h3> --}}
                {{-- <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Iklan </a> --}}
                {{-- <a href="#" class="btn btn-outline-info btn-flat btn-sm"><i class="fas fa-print"></i> Hapus Data Terpilih</a> --}}
                {{-- <a href="{{ url('/artikel')}}" class="btn btn-outline-dark btn-flat btn-sm"><i class="fas fa-print"></i> Kembali ke artikel</a> --}}
              </div>
              <div class="card-body">
                  @include('sistem.notifikasi')
                 <section>
                     <form action="{{ url('/info-website/'.$info->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $info->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Teks diatas</label>
                                    <input type="text" name="teks_atas" value="{{ $info->teks_atas}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Alamat Email</label>
                                    <input type="email" name="email" value="{{ $info->email}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">No Telp</label>
                                    <input type="text" name="telp" value="{{ $info->telp}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $info->alamat}}" class="form-control col-md-8" required>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Tentang Website</label>
                                    <textarea name="tentang" id="" class="form-control col-md-8" cols="30" rows="4">{{ $info->tentang}}</textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Alamat di Google Maps</label>
                                    <textarea name="maps" id="" class="form-control col-md-8" cols="30" rows="4">{{ $info->maps}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-4 p-2">
                                        <img src="{{ asset('/img/admin/info/'.$info->logo_brand)}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="" >Logo Brand</label>
                                        <input type="file" name="logo_brand" class="form-control">
                                        <i>unggah jika ingin merubah</i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 p-2">
                                        <img src="{{ asset('/img/admin/info/'.$info->bg_produk)}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="" >Background Produk</label>
                                        <input type="file" name="bg_produk" class="form-control">
                                        <i>unggah jika ingin merubah</i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Facebook</label>
                                    <input type="url" name="link_fb" value="{{ $info->link_fb}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Twitter</label>
                                    <input type="url" name="link_tw" value="{{ $info->link_tw}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Youtube</label>
                                    <input type="url" name="link_yt" value="{{ $info->link_yt}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Instagram</label>
                                    <input type="url" name="link_ig" value="{{ $info->link_ig}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Pinterest</label>
                                    <input type="url" name="link_pi" value="{{ $info->link_pi}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 p-2">Link Linkedin</label>
                                    <input type="url" name="link_in" value="{{ $info->link_in}}" class="form-control col-md-8">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i> SIMPAN PERUBAHA</button>
                                </div>
                            </div>
                        </div>
                     </form>
                 </section>
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
            <form action="{{ url('/iklan')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
            <h4 class="modal-title">Tambah Iklan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Iklan<span class="text-danger">*</span></label>
                        <input type="text" name="nama_iklan" id="nama_iklan" class="form-control col-md-8" placeholder="Nama Iklan" value="{{ old('nama_iklan')}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Posisi Iklan<span class="text-danger">*</span></label>
                        <select name="posisi" id="posisi" class="form-control col-md-8" required>
                            <option value="">-- pilih posisi --</option>
                            @foreach (kingdom_posisiiklan() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Teks kecil tambahan</label>
                        <input type="text" name="teks_kecil" id="teks_kecil" class="form-control col-md-8" placeholder="Teks Kecil" value="{{ old('teks_kecil')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Teks Penting tambahan</label>
                        <input type="text" name="teks_penting" id="teks_penting" class="form-control col-md-8" placeholder="Teks Kecil" value="{{ old('teks_penting')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Link Tambahan</label>
                        <input type="url" name="link" id="link" class="form-control col-md-8" placeholder="https:://xxxx" value="{{ old('link')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama button link</label>
                        <input type="text" name="nama_link" id="nama_link" class="form-control col-md-8" placeholder="simpan/klikdisini/dll" value="{{ old('nama_link')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Deskripsi<span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control col-md-8" required>{{ old('deskripsi')}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Gambar Iklan<span class="text-danger">*</span></label>
                        <input type="file" name="gambar_iklan" id="gambar_iklan" class="form-control col-md-8" required>
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
            <form action="{{ route('iklan.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="modal-header">
            <h4 class="modal-title">Edit Iklan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-3">
                <input type="hidden" name="id" id="id">
                <section class="p-3">
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama Iklan<span class="text-danger">*</span></label>
                        <input type="text" name="nama_iklan" id="nama_iklan" class="form-control col-md-8" placeholder="Nama Iklan" value="{{ old('nama_iklan')}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Posisi Iklan<span class="text-danger">*</span></label>
                        <select name="posisi" id="posisi" class="form-control col-md-8" required>
                            @foreach (kingdom_posisiiklan() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Status Iklan<span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control col-md-8" required>
                            @foreach (list_status() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Teks kecil tambahan</label>
                        <input type="text" name="teks_kecil" id="teks_kecil" class="form-control col-md-8" placeholder="Teks Kecil" value="{{ old('teks_kecil')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Teks Penting tambahan</label>
                        <input type="text" name="teks_penting" id="teks_penting" class="form-control col-md-8" placeholder="Teks Kecil" value="{{ old('teks_penting')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Link Tambahan</label>
                        <input type="url" name="link" id="link" class="form-control col-md-8" placeholder="https:://xxxx" value="{{ old('link')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Nama button link</label>
                        <input type="text" name="nama_link" id="nama_link" class="form-control col-md-8" placeholder="simpan/klikdisini/dll" value="{{ old('nama_link')}}">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Deskripsi<span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control col-md-8" required>{{ old('deskripsi')}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 p-2">Gambar Iklan<span class="text-danger">unggah jika ingin merubah</span></label>
                        <input type="file" name="gambar_iklan" id="gambar_iklan" class="form-control col-md-8">
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

    @section('script')
        
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_iklan = button.data('nama_iklan')
                var deskripsi = button.data('deskripsi')
                var posisi = button.data('posisi')
                var nama_link = button.data('nama_link')
                var link = button.data('link')
                var teks_kecil = button.data('teks_kecil')
                var teks_penting = button.data('teks_penting')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama_iklan').val(nama_iklan);
                modal.find('.modal-body #deskripsi').val(deskripsi);
                modal.find('.modal-body #posisi').val(posisi);
                modal.find('.modal-body #teks_kecil').val(teks_kecil);
                modal.find('.modal-body #teks_penting').val(teks_penting);
                modal.find('.modal-body #nama_link').val(nama_link);
                modal.find('.modal-body #link').val(link);
                modal.find('.modal-body #status').val(status);
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

</x-app-layout>
