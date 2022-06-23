@extends('layouts.admin')

@section('title')
    Data PPDB
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Detail Lengkap Formulir Peserta Didik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Beranda</a></li>
            <li class="breadcrumb-item active">Detail PPDB</li>
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
                <a href="{{ url('ppdb') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-angle-left"></i> Kembali</a>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th width="20%">No Pendaftaran</th>
                            <th>{{ $ppdb->no_pendaftaran }}</th>
                        </tr>
                        <tr>
                            <th colspan="2" class="table-primary">DATA PRIBADI</th>
                        </tr>
                        @foreach (json_decode($ppdb->pesertadidik) as $label => $isi)
                            @if ($label <> 'tanggal')
                                <tr>
                                    <th class="text-capitalize">{{ $label }}</th>
                                    <th class="text-capitalize">: {{ $isi }}</th>
                                </tr>
                                
                            @endif
                        @endforeach
                        <tr>
                            <th colspan="2" class="table-primary">DATA ORANGTUA</th>
                        </tr>
                        @foreach (json_decode($ppdb->orangtua) as $label => $isi)
                            <tr>
                                <th colspan="2" class="table-info text-uppercase">{{ $label }}</th>
                            </tr>
                            @foreach ($isi as $l => $i)
                            <tr>
                                <th class="text-capitalize">{{ $l }}</th>
                                <th class="text-capitalize">: {{ $i }}</th>
                            </tr>
                            @endforeach
                        @endforeach
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

