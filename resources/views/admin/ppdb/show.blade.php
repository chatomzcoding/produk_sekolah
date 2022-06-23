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
                <span class="float-right">{{ $ppdb->no_pendaftaran }}</span>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-3">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Data Pribadi</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Data Orangtua/wali</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Rincian Peserta Didik</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                      </div>
                    </div>
                    <div class="col-9">
                      <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <section>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        @foreach (json_decode($ppdb->pesertadidik) as $label => $isi)
                                            @if ($label <> 'tanggal')
                                                <tr>
                                                    <th class="text-capitalize">{{ $label }}</th>
                                                    <th class="text-capitalize">: {{ $isi }}</th>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <section>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
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
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <section>
                                @php
                                    $priodik = json_decode($ppdb->priodik);
                                    $prestasi = json_decode($ppdb->prestasi);
                                @endphp
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th colspan="2" class="table-info">DATA PRIODIK</th>
                                        </tr>
                                        <tr>
                                            <th>Tinggi Badan</th>
                                            <td>: {{ $priodik->tb }} cm</td>
                                        </tr>
                                        <tr>
                                            <th>Berat Badan</th>
                                            <td>: {{ $priodik->bb }} kg</td>
                                        </tr>
                                        <tr>
                                            <th>Lingkar Kepala</th>
                                            <td>: {{ $priodik->lk }} cm</td>
                                        </tr>
                                        <tr>
                                            <th>Jarak ke sekolah</th>
                                            <td>: {{ $priodik->jarak.' | '.$priodik->nilai_jarak }} km</td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Saudara</th>
                                            <td>: {{ $priodik->saudara }} bersaudara</td>
                                        </tr>
                                    </table>
                                    <h5>DATA PRESTASI</h5>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Tingkat</th>
                                                <th>Nama</th>
                                                <th>Tahun</th>
                                                <th>Penyelenggara</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prestasi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->tingkat }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->penyelenggara }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                  </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                      </div>
                    </div>
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

