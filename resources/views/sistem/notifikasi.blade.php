{{-- alert versi 1 --}}
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  @if (session('danger'))
  <div class="alert alert-danger">
      {!! session('danger') !!}
  </div>
  @endif
  @if (session('warning'))
  <div class="alert alert-warning">
      {{ session('warning') }}
  </div>
  @endif
  @if (session('info'))
  <div class="alert alert-info">
      {{ session('info') }}
  </div>
  @endif
{{-- end alert versi 1 --}}

{{-- alert versi 2 --}}
  @if (session('successv2'))
  <div class="callout callout-success">
      <strong><i class="fas fa-bullhorn text-success"></i> &nbsp;&nbsp;&nbsp;</strong> {{ session('successv2') }}
  </div>
  @endif
  @if (session('dangerv2'))
  <div class="callout callout-danger">
      {!! session('dangerv2') !!}
  </div>
  @endif
  @if (session('warningv2'))
  <div class="callout callout-warning">
      {{ session('warningv2') }}
  </div>
  @endif
  @if (session('infov2'))
  <div class="callout callout-info">
      {{ session('infov2') }}
  </div>
  @endif
  {{-- end alert versi 2 --}}

{{-- notifikasi data berhasil di simpan --}}
@if (session('ds'))
<div class="callout callout-success">
    <h5>Berhasil!</h5>
    <p>Data {{ session('ds') }} telah ditambahkan.</p>
  </div>
@endif

{{-- notifikasi data berhasil di update --}}
@if (session('du'))
<div class="callout callout-info">
    <h5>Berhasil!</h5>
    <p>Data {{ session('du') }} telah diperbaharui.</p>
  </div>
@endif

{{-- notifikasi data berhasil di hapus --}}
@if (session('dd'))
<div class="callout callout-danger">
    <h5>Berhasil!</h5>
    <p>Data {{ session('dd') }} telah dihapus.</p>
  </div>
@endif