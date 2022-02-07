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
                            <li>Kontak</li>
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

        <!-- Google Map -->
        
        <div class="map">
            <section class="p-2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3871.2534057434113!2d107.59437897443038!3d-7.462808444924463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x428ca4c55f73f653!2sSLB%20PUTRA%20HANJUANG!5e0!3m2!1sid!2sid!4v1619597832978!5m2!1sid!2sid" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>
        </div>

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