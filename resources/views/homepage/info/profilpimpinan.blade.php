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
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li>Profil - Profil Pimpinan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<section>
    <div class="row mt-3 mb-3">
        <div class="col-md-4 p-3">
            <section class="p-3">
                <img src="{{ asset('/img/'.$profil->gambar)}}" alt="" width="100%">
            </section>
        </div>
        <div class="col-md-8 p-3">
            <section class="p-3">
                <h2>PROFIL PIMPINAN SEKOLAH {{ $profil->nama_sekolah}}</h2>
                detail disini
            </section>
        </div>
    </div>
</section>


@endsection