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
                <h3 class="bg-warning">FORMULIR PESERTA DIDIK</h3>
                Tanggal : {{ date_indo(tgl_sekarang()) }}
            </header>
            <main>
                <form action="" method="post">
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
                    </table>
                </form>
            </main>
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