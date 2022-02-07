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
                            <li>Profil - Visi dan Misi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<section>
    <div class="row mt-3 mb-3">
        <div class="col-md-12 p-3">
            <section class="p-3">
                <h2 class="text-center">VISI</h2> <br>
                <div>{!! $profil->visi !!}</div>
            </section>
        </div>
        <div class="col-md-12 p-3">
            <section class="p-3">
                <h2 class="text-center">MISI</h2> <br>
                <div>{!! $profil->misi !!}</div>
            </section>
        </div>
    </div>
</section>


@endsection