@extends('layouts.admin')

@section('title')
    Data PPDB
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data PPDB</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar PPDB</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
   
@section('content')
    
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Formulis PPDB</h3>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Tanggal Daftar</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>NIK</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @forelse ($ppdb as $item)
                            @php
                                $peserta = json_decode($item->pesertadidik)
                            @endphp
                            <tr>
                                    <td class="text-center">{{ $loop->iteration}}</td>
                                    <td>{{ $peserta->tanggal}}</td>
                                    <td>{{ $peserta->nama}}</td>
                                    <td>{{ $peserta->tempat_lahir.', '.date_indo($peserta->tanggal_lahir)}}</td>
                                    <td>{{ $peserta->nik}}</td>
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

    @section('script')
        
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

