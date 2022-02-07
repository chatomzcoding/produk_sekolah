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
                            <li>Profil - Sejarah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<section>
    <div class="row p-2">
        <div class="col-md-6">
            <section class="p-3">
                <img src="{{ asset('/img/'.$profil->gambar)}}" alt="" width="100%">
            </section>
        </div>
        <div class="col-md-6">
            <section class="p-3">
                <h2>SEJARAH {{ $profil->nama_sekolah}}</h2>
                <p>{!! $profil->sejarah !!}</p>
            </section>
        </div>
    </div>
    {{-- <div class="row mt-3 mb-3">
        <div class="col-md-6 p-3">
            <section class="p-3">
                <h2 class="text-center">VISI</h2>
                <div>{!! $profil->visi !!}</div>
            </section>
        </div>
        <div class="col-md-6 p-3">
            <section class="p-3">
                <h2 class="text-center">MISI</h2>
                <div>{!! $profil->misi !!}</div>
            </section>
        </div>
    </div> --}}
</section>


@endsection