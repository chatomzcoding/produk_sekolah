@extends('layouts.homepage')
@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/contact_responsive.css')}}">
@endsection
@section('container')
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/')}}">Beranda</a></li>
                            <li>Pendaftaran Peserta Didik Baru</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<!-- Contact -->

<div class="contact">
    
    <!-- Contact Map -->

    <div class="contact_map">

        <section class="container">
            <header>
                <h3 class="bg-warning text-center">FORMULIR PESERTA DIDIK</h3>
                Tanggal : {{ date_indo(tgl_sekarang()) }}
            </header>
            @if ($s == 'index')
                <main>
                    <form action="{{ url('ppdb') }}" method="post">
                        @csrf

                        <h4>DATA PRIBADI</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">1</td>
                                <td width="20%">Nama Lengkap <strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" required>
                                        <small class="text-primary">Nama peserta didik sesuai dengan dokumen resmi yang berlaku (Akta atau Ijazah sebelumnya). Hanya bisa diubah melalui http:://vervalpd.data.kemdikbud.go.id</small>
                                    </div>
                                </td>
                            </tr>
                            <x-input no="2" label="Jenis Kelamin" ket="Jenis Kelamin Peseta Didik">
                                <input type="radio" name="jk" value="laki-laki"> Laki-laki
                                <input type="radio" name="jk" value="perempuan"> Perempuan
                            </x-input>
                            <x-input no="3" label="NISN" wajib="FALSE" ket="Nomor Induk Siswa Nasional peserta didik (jika memiliki), Jika belum memiliki, maka wajib dikosongkan. NISN memiliki format 10 digit angka. Contoh : 0009321234. Untuk memeriksa NISN, dapat mengunjungi laman http://nisn.data.kemdikbud.go.id/page/data">
                                <input type="text" name="nisn" class="form-control">
                            </x-input>
                            <x-input no="4" label="NIK/No. KITAS (Untuk WNA)" ket="Nomor Induk Kependudukan yang tercantum pada Kartu Keluarga, kartu Identitas Anak, atau KTP (jika sudah memiliki) bagi WNI. NIK memiliki format 16 digit angka. Pastikan NIK tidak tertukar dengan kartu keluarga, karena keduanya memiliki format yang sama. Bagi WNA, diisi dengan nomor kartu Izin Tinggal Terbatas (KITAS)">
                                <input type="text" name="nik" class="form-control" required>
                            </x-input>
                            <x-input no="5" label="No KK">
                                <input type="text" name="no_kk" class="form-control" required>
                            </x-input>
                            <x-input no="6" label="Tempat Lahir" ket="Tempat lahir peserta didik sesuai dengan dokumen resmi yang berlaku">
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </x-input>
                            <x-input no="7" label="Tanggal Lahir" ket="Tanggal Lahir peserta didik sesuai dengan dokumen resmi yang berlaku">
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </x-input>
                            <x-input no="8" label="No Registrasi Akta Lahir" wajib="FALSE" ket="Nomor registrasi Akta Kelahiran, Nomor Registrasi yang dimaksud tercantum pada bagian tengah atas lembar kutipan akta kelahiran">
                                <input type="text" name="no_akta" class="form-control">
                            </x-input>
                            <x-input no="9" label="Agama & Kepercayaan" ket="Agama atau kepercayaan yang dianut oleh peserta didik. Apabila peserta didik adalah penghayat kepercayaan (misalkan pada daerag tertentu yang masih memiliki penganut kepercayaan), dapat memilih opsi Kepercayaan kpd Tuhan YME">
                                <select name="agama" id="" class="form-control">
                                    <option value="islam">Islam</option>
                                    <option value="kristen/protestan">Kristen/Protestan</option>
                                    <option value="katholik">Katholik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="khonghucu">Khonghucu</option>
                                    <option value="kepercayaan kepada tuhan yme">Kepercayaan kepada Tuhan YME</option>
                                </select>
                            </x-input>
                            <x-input no="10" label="Kewarganegaraan" ket="Kewarganegaraan Peserta didik">
                                <input type="radio" name="warga_negara" value="WNI"> Indonesia (WNI)
                                <input type="radio" name="warga_negara" value="WNA"> Asing (WNA) <br>
                                <input type="text" name="nama_negara" placeholder="nama negara" class="form-control">
                            </x-input>
                            <x-input no="11" label="Berkebutuhan Khusus" ket="kebutuhan Khusus yang disandang oleh peserta didik. Dapat dipilih lebih dari satu">
                                @foreach (kekhususan() as $item)
                                <input type="checkbox" name="khusus" value="{{ $item }}"> {{ $item }} <br>
                                @endforeach
                            </x-input>
                            <x-input no="12" label="Alamat Jalan" ket="Jalur tempat tinggal peserta didik, terdiri dari atas gang, kompleks, blok, nomor rumah, dan sebagainya selain informasi yang diminta oleh kolom-kolom yang lain pada bagian ini">
                                <input type="text" name="alamat" class="form-control" required>
                            </x-input>
                            <x-input no="13" label="RT" ket="Nomor RT tempat tinggal peserta didik saat ini">
                                <input type="text" name="rt" class="form-control" required>
                            </x-input>
                            <x-input no="14" label="RW" ket="Nomor RW tempat tinggal peserta didik saat ini">
                                <input type="text" name="rw" class="form-control" required>
                            </x-input>
                            <x-input no="15" label="Nama Dusun" ket="Nama Dusun tempat tinggal peserta didik saat ini">
                                <input type="text" name="dusun" class="form-control" required>
                            </x-input>
                            <x-input no="16" label="Nama Kelurahan/Desa" ket="Nama Kelurahan tempat tinggal peserta didik saat ini">
                                <input type="text" name="desa" class="form-control" required>
                            </x-input>
                            <x-input no="17" label="Kecamatan" ket="Nama Kecamatan tempat tinggal peserta didik saat ini">
                                <input type="text" name="kecamatan" class="form-control" required>
                            </x-input>
                            <x-input no="18" label="Kode Pos" ket="Kode Pos tempat tinggal peserta didik saat ini">
                                <input type="text" name="kode_pos" class="form-control" required>
                            </x-input>
                            <x-input no="19" label="Lintang" wajib="FALSE" ket="Titik Koordinat lintang peserta didik">
                                <input type="text" name="lintang" class="form-control">
                            </x-input>
                            <x-input no="20" label="Bujur" wajib="FALSE" ket="Titik Koordinat bujur peserta didik">
                                <input type="text" name="bujur" class="form-control">
                            </x-input>
                            <x-input no="21" label="Tempat Tinggal" ket="Kepemilikan tempat tinggal peserta didik saat ini (yang telah diisikan pada kolom-kolom sebelumnya diatas)">
                                <select name="tinggal" id="" class="form-control">
                                    <option value="bersama orang tua">Bersama Orang Tua</option>
                                    <option value="wali">wali</option>
                                    <option value="kos">Kos</option>
                                    <option value="asrama">Asrama</option>
                                    <option value="panti asuhan">Panti Asuhan</option>
                                </select>
                            </x-input>
                            <x-input no="22" label="Moda Transportasi" ket="Jenis kendaraan utama atau yang paling sering digunakan peserta didik untuk berangkat ke sekolah">
                                <select name="transportasi" id="" class="form-control">
                                    <option value="Jalan Kaki">Jalan Kaki</option>
                                    <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                                    <option value="Kendaraan Umum/angkot/Pete-pete">Kendaraan Umum/angkot/Pete-pete</option>
                                    <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                                    <option value="Kereta Api">Kereta Api</option>
                                    <option value="Ojek">Ojek</option>
                                    <option value="Andong/Bendi/Sado/Dokar/delman/Becak">Andong/Bendi/Sado/Dokar/delman/Becak</option>
                                    <option value="Perahu Penyebrangan/Rakit/Getek">Perahu Penyebrangan/Rakit/Getek</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </x-input>
                            <x-input no="23" label="Anak Keberapa" ket="Sesuaikan dengan urutan di kartu keluarga">
                                <input type="text" name="anak_ke" class="form-control" required>
                            </x-input>
                            <x-input no="24" label="Pekerjaan (Diperuntukkan untuk warga belajar)">
                                <select name="pekerjaan" id="" class="form-control">
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                </select>
                            </x-input>
                            <x-input no="25" label="Apakah Punya KIP" ket="Pilih Ya apabila peserta didik memiliki Kartu Indonesia Pintar (KIP). Pilih tidak jika tidak memiliki">
                                <input type="radio" name="kip" value="ya"> Ya
                                <input type="radio" name="kip" value="tidak"> Tidak
                            </x-input>
                            <x-input no="26" label="Apakah peserta didik tersebut tetap akan menerima KIP" ket="Status Bahwa peserta didik sudah menerima atau belum menerika Kartu Indonesia ">
                                <input type="radio" name="status_kip" value="ya"> Ya
                                <input type="radio" name="status_kip" value="tidak"> Tidak
                            </x-input>
                            <x-input no="27" label="Alasan Menolak PIP" ket="Alasan utama peserta didik. jika layak menerima manfaat PIP. Kolom ini akan muncul apabila dipilih Ya untuk mengisi kolom Usulan dari Sekolah (Layak PIP)">
                                <select name="pip" id="" class="form-control">
                                    <option value="Dilarang pemda karena menerima bantuan serupa">Dilarang pemda karena menerima bantuan serupa</option>
                                    <option value="Menolak">Menolak</option>
                                    <option value="Sudah Mampu">Sudah Mampu</option>
                                </select>
                            </x-input>
                        </table>
                        <h4>DATA AYAH KANDUNG</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">28</td>
                                <td width="20%">Nama Ayah Kandung <strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="nama_ayah" class="form-control" required>
                                        <small class="text-primary">Nama ayah peserta didik sesuai dengan dokumen resmi yang berlaku.</small>
                                    </div>
                                </td>
                            </tr>
                            <x-input no="29" label="NIK Ayah" ket="Nomor Induk Kependudukan yang tercantum pada kartu keluarga">
                                <input type="text" name="nik_ayah" class="form-control" required>
                            </x-input>
                            <x-input no="30" label="Tahun Lahir" ket="Tahun lahir ayah kandung peserta didik">
                                <input type="text" name="tahun_lahir_ayah" class="form-control" required>
                            </x-input>
                            <x-input no="31" label="Pendidikan" ket="Pendidikan terakhir ayah kandung peserta didik">
                                <select name="pendidikan_ayah" id="" class="form-control">
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD Sederajat">SD Sederajat</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </x-input>
                            <x-input no="32" label="pekerjaan" ket="Pekerjaan Utama ayah kandung peserta didik">
                                <select name="pekerjaan_ayah" id="" class="form-control">
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                </select>
                            </x-input>
                            <x-input no="33" label="Penghasilan Bulanan">
                                <select name="penghasilan_ayah" id="" class="form-control">
                                    <option value="< Rp. 500.000">< Rp. 500.000</option>
                                    <option value="Rp. 500.000-Rp.999.999">Rp. 500.000-Rp.999.999</option>
                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                    <option value="Rp. 2.000.000-Rp.4.999.999">Rp. 2.000.000-Rp.4.999.999</option>
                                    <option value="Rp. 5.000.000-Rp.20.000.000">Rp. 5.000.000-Rp.20.000.000</option>
                                    <option value=" > Rp. 20.000.000"> > Rp. 20.000.000</option>
                                    <option value="Tidak berpengehasilan">Tidak berpengehasilan</option>
                                </select>
                            </x-input>
                            <x-input no="34" label="Berkebutuhan Khusus" ket="kebutuhan Khusus yang disandang oleh ayah kandung peserta didik. Dapat dipilih lebih dari satu">
                                @foreach (kekhususan() as $item)
                                <input type="checkbox" name="khusus_ayah" value="{{ $item }}"> {{ $item }} <br>
                                @endforeach
                            </x-input>
                        </table>
                        <h4>DATA IBU KANDUNG</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">35</td>
                                <td width="20%">Nama Ibu Kandung <strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="nama_ibu" class="form-control" required>
                                        <small class="text-primary">Nama ibu peserta didik sesuai dengan dokumen resmi yang berlaku.</small>
                                    </div>
                                </td>
                            </tr>
                            <x-input no="36" label="NIK Ibu" ket="Nomor Induk Kependudukan yang tercantum pada kartu keluarga">
                                <input type="text" name="nik_ibu" class="form-control" required>
                            </x-input>
                            <x-input no="37" label="Tahun Lahir" ket="Tahun lahir ayah kandung peserta didik">
                                <input type="text" name="tahun_lahir_ibu" class="form-control" required>
                            </x-input>
                            <x-input no="38" label="Pendidikan" ket="Pendidikan terakhir ibu kandung peserta didik">
                                <select name="pendidikan_ibu" id="" class="form-control">
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD Sederajat">SD Sederajat</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </x-input>
                            <x-input no="39" label="pekerjaan" ket="Pekerjaan Utama ibu kandung peserta didik">
                                <select name="pekerjaan_ibu" id="" class="form-control">
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                </select>
                            </x-input>
                            <x-input no="40" label="Penghasilan Bulanan">
                                <select name="penghasilan_ibu" id="" class="form-control">
                                    <option value="< Rp. 500.000">< Rp. 500.000</option>
                                    <option value="Rp. 500.000-Rp.999.999">Rp. 500.000-Rp.999.999</option>
                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                    <option value="Rp. 2.000.000-Rp.4.999.999">Rp. 2.000.000-Rp.4.999.999</option>
                                    <option value="Rp. 5.000.000-Rp.20.000.000">Rp. 5.000.000-Rp.20.000.000</option>
                                    <option value=" > Rp. 20.000.000"> > Rp. 20.000.000</option>
                                    <option value="Tidak berpengehasilan">Tidak berpengehasilan</option>
                                </select>
                            </x-input>
                            <x-input no="41" label="Berkebutuhan Khusus" ket="kebutuhan Khusus yang disandang oleh Ibu kandung peserta didik. Dapat dipilih lebih dari satu">
                                @foreach (kekhususan() as $item)
                                <input type="checkbox" name="khusus_ibu" value="{{ $item }}"> {{ $item }} <br>
                                @endforeach
                            </x-input>
                        </table>
                        <h4>DATA WALI</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">42</td>
                                <td width="20%">Nama Wali<strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="nama_wali" class="form-control" required>
                                        <small class="text-primary">Nama Wali peserta didik sesuai dengan dokumen resmi yang berlaku.</small>
                                    </div>
                                </td>
                            </tr>
                            <x-input no="43" label="NIK Wali" ket="Nomor Induk Kependudukan yang tercantum pada kartu keluarga">
                                <input type="text" name="nik_wali" class="form-control" required>
                            </x-input>
                            <x-input no="44" label="Tahun Lahir" ket="Tahun lahir wali kandung peserta didik">
                                <input type="text" name="tahun_lahir_wali" class="form-control" required>
                            </x-input>
                            <x-input no="45" label="Pendidikan" ket="Pendidikan terakhir wali kandung peserta didik">
                                <select name="pendidikan_wali" id="" class="form-control">
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD Sederajat">SD Sederajat</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </x-input>
                            <x-input no="46" label="pekerjaan" ket="Pekerjaan Utama wali peserta didik">
                                <select name="pekerjaan_wali" id="" class="form-control">
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                </select>
                            </x-input>
                            <x-input no="47" label="Penghasilan Bulanan">
                                <select name="penghasilan_wali" id="" class="form-control">
                                    <option value="< Rp. 500.000">< Rp. 500.000</option>
                                    <option value="Rp. 500.000-Rp.999.999">Rp. 500.000-Rp.999.999</option>
                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                    <option value="Rp. 2.000.000-Rp.4.999.999">Rp. 2.000.000-Rp.4.999.999</option>
                                    <option value="Rp. 5.000.000-Rp.20.000.000">Rp. 5.000.000-Rp.20.000.000</option>
                                    <option value=" > Rp. 20.000.000"> > Rp. 20.000.000</option>
                                    <option value="Tidak berpengehasilan">Tidak berpengehasilan</option>
                                </select>
                            </x-input>
                        </table>
                        <h4>KONTAK</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">48</td>
                                <td width="20%">Nomor Telepon Rumah<strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="no_telepon" class="form-control" required>
                                        <small class="text-primary">Diisi nomor telepon rumah</small>
                                    </div>
                                </td>
                            </tr>
                            <x-input no="49" label="Nomor HP" ket="Diisi nomor telepon seluler">
                                <input type="text" name="no_hp" class="form-control" required>
                            </x-input>
                            <x-input no="50" label="Email" ket="Diisi alamat surat elektronik">
                                <input type="email" name="email" class="form-control" required>
                            </x-input>
                        </table>
                            <h3 class="bg-warning">DATA RINCIAN PESERTA DIDIK</h3>
                        <h4>DATA PRIODIK</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">1</td>
                                <td width="20%">Tinggi Badan<strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="tb" class="form-control" required>
                                        <small class="text-primary">Tinggi badan peserta didik dalam satuan sentimeter</small>
                                    </div>
                                </td>
                            </tr>
                            <x-input no="2" label="Berat Badan" ket="Berat badan peserta didik dalam satuan kilogram">
                                <input type="text" name="bb" class="form-control" required>
                            </x-input>
                            <x-input no="3" label="Lingkar Kepala">
                                <input type="text" name="lk" class="form-control" required>
                            </x-input>
                            <x-input no="4" label="Jarak Tempuh ke sekolah">
                                <input type="radio" name="jarak" value="Kurang dari 1km"> Kurang dari 1 km
                                <input type="radio" name="jarak" value="Lebih dari 1 km"> Lebih dari 1 km
                            </x-input>
                            <x-input no="5" label="Sebutkan (dalam kilometer)" ket="Apabila jarak rumah peserta didik ke sekolah lebih dari 1 km, isikan dengan angka jarak yang sebenarnya">
                                <input type="text" name="nilai_jarak" class="form-control" required>
                            </x-input>

                            <x-input no="6" label="waktu Tempuh ke sekolah (Jam.menit)" ket="Lama tempuh peserta didik ke sekolah">
                                <input type="text" name="jam" placeholder="masukkan jam" class="form-control" required>
                                <input type="text" name="menit" placeholder="masukkan menit" class="form-control" required>
                            </x-input>
                            <x-input no="7" label="Jumlah saudara kandung" ket="Jumlah saudara kandung yang dimiliki peserta didik">
                                <input type="number" name="saudara" class="form-control" required>
                            </x-input>
                        </table>
                        <h4>PRESTASI</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">No</td>.
                                <td>Jenis Prestasi</td>
                                <td>Tingkat</td>
                                <td>Nama Prestasi</td>
                                <td>Tahun</td>
                                <td>Penyelenggara</td>
                            </tr>
                            @php
                                $no = 1
                            @endphp
                            @for ($i = 0; $i < 3; $i++)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <select name="jenis_prestasi[]" id="" class="form-control">
                                            <option value="Sains">Sains</option>
                                            <option value="Seni">Seni</option>
                                            <option value="Olahraga">Olahraga</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="tingkat[]" id="" class="form-control">
                                            <option value="Sekolah">Sekolah</option>
                                            <option value="Kecamatan">Kecamatan</option>
                                            <option value="Kabupaten">Kabupaten</option>
                                            <option value="Provinsi">Provinsi</option>
                                            <option value="Nasional">Nasional</option>
                                            <option value="Internasional">Internasional</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="nama_prestasi[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="tahun_prestasi[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="penyelenggara[]" class="form-control">
                                    </td>
                                </tr>
                            @endfor
                        </table>
                        <h4>BEASISWA</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="5%">No</td>.
                                <td>Jenis Beasiswa</td>
                                <td>Keterangan</td>
                                <td>Tahun Mulai</td>
                                <td>Tahun Selesai</td>
                            </tr>
                            @php
                                $no = 1
                            @endphp
                            @for ($i = 0; $i < 3; $i++)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <select name="jenis_beasiswa[]" id="" class="form-control">
                                            <option value="Anak Berprestasi">Anak Berprestasi</option>
                                            <option value="Anak Miskin">Anak Miskin</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Unggulan">Unggulan</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="tahun_mulai[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="tahun_selesai[]" class="form-control">
                                    </td>
                                </tr>
                            @endfor
                        </table>
                        <h4>KESEJAHTERAAN PESERTA DIDIK</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td width="20%">Jenis Kesejahteraan<strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <select name="jenis_kesejahteraan" id="" class="form-control">
                                            <option value="PKH">PKH</option>
                                            <option value="PIP">PIP</option>
                                            <option value="Kartu Perlindungan Sosial">Kartu Perlindungan Sosial</option>
                                            <option value="Kartu Keluarga Sejahtera">Kartu Keluarga Sejahtera</option>
                                            <option value="Kartu Kesehatan">Kartu Kesehatan</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">no Kartu<strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="no_kartu" class="form-control" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Nama di kartu<strong class="text-danger">*</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="nama_kartu" class="form-control" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right">
                                    <button type="submit" class="btn btn-primary">KIRIM PENDAFTARAN</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </main>
            @else
                <main class="mt-3">
                    <div class="alert alert-info">
                        <strong>BERHASIL</strong>
                        Pendaftaran telah dikirim ke pihak sekolah, terima kasih telah mengisi Pendaftaran Online di Sekolah SLB Hanjuang
                    </div>
                    <p>Berikut Ringkasan Pendaftaran</p>
                    <table class="table">
                        @php
                            $peserta = json_decode($ppdb->pesertadidik)
                        @endphp
                        <tr>
                            <th width="20%">Nama Lengkap</th>
                            <td class="text-capitalize">: {{ $peserta->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td class="text-capitalize">: {{ $peserta->nik }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <td class="text-capitalize">: {{ $peserta->tempat_lahir.', '.date_indo($peserta->tanggal_lahir) }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td class="text-capitalize">: {{ $peserta->jk }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td class="text-capitalize">: {{ $peserta->alamat }}</td>
                        </tr>
                    </table>
                </main>                
            @endif
        </section>
        

    </div>

    <!-- Contact Info -->

    <div class="contact_info_container">
        <div class="container">
            <div class="row">

                <!-- Contact Info -->
                <div class="col-md-12">
                    <div class="contact_info">
                        <div class="contact_info_title">Kontak Informasi</div>
                        <div class="contact_info_text">
                            <p>{{ $kontak->keterangan}}</p>
                        </div>
                        <div class="contact_info_location">
                            <div class="contact_info_location_title">{{ $kontak->line}}</div>
                            <ul class="location_list">
                                <li>{{ $kontak->pinterest}}</li>
                                <li>{{ $kontak->no_telp}}</li>
                                <li>{{ $kontak->email}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection