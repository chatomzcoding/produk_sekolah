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
                            <li>Fasilitas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<!-- Contact -->

<div class="contact">
    
    <!-- Contact Info -->

    <div class="contact_info_container">
        <div class="container">
            <div class="row">

                <!-- Contact Info -->
                <div class="col-md-12">
                    <div class="row courses_row">
                        <!-- Course -->
                       	<!-- Team Item -->
                           @foreach ($fasilitas as $item)
                            <div class="col-lg-4 event_col">
                                <div class="event event_left">
                                    <div class="event_image"><img src="{{ asset('/img/fasilitas/'.$item->gambar_fasilitas)}}" alt=""></div>
                                    <div class="event_body d-flex flex-row align-items-start justify-content-start">
                                        <div class="event_date">
                                            <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                                <div class="event_day trans_200">0{{ $loop->iteration}}</div>
                                                <div class="event_month trans_200">{{ $item->nama_alias}}</div>
                                            </div>
                                        </div>
                                        <div class="event_content">
                                            <div class="event_title"><a href="{{ asset('/img/fasilitas/'.$item->gambar_fasilitas)}}" target="_blank">{{ $item->nama_fasilitas}}</a></div>
                                            <div class="event_info_container">
                                                <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Tahun {{ $item->tahun}}</span></div>
                                                <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ $item->kategori}}</span></div>
                                                <div class="event_text">
                                                    <p>{{ $item->keterangan}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection