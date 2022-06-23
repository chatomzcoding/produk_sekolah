<x-admin-layout title="data artikel" menu="artikel">
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Data Artikel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
                <li class="breadcrumb-item active">Tambah Artikel</li>
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
                        <a href="{{ url('artikel') }}" class="btn btn-outline-secondary btn-sm pop-info" title="Tambah Data Guru"><i class="fas fa-angle-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                    <form action="{{ url('/artikel')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sesi" value="artikel">
                        <div class="form-group">
                            <label for="">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" placeholder="masukkan judul artikel artikel" value="{{ old('judul')}}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Artikel</label> <br>
                            <input type="file" name="gambar" required>
                        </div>
                        <div class="form-group">
                            <label for="">Isi Artikel</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required>{{ old('isi')}}</textarea>
                        </div>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace('isi', {
                            width: '100%',
                            height: 400
                            });
                        </script>
                          <div class="form-group text-right">
                              <button type="submit" class="btn btn-primary ">SIMPAN</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
       
    </x-slot>
    <x-slot name="kodejs">
     
    </x-slot>
</x-admin-layout>