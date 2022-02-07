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
                            <li>Program</li>
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
                        @foreach ($program as $item)
                            <div class="col-lg-4 course_col">
                                <div class="course">
                                    <div class="course_image"><img src="{{ asset('/img/jurusan/'.$item->gambar_jurusan)}}" alt=""></div>
                                    <div class="course_body">
                                        <h3 class="course_title">{{ $item->nama_jurusan}}</h3>
                                        <div class="course_teacher">{{ $item->nama_alias}}</div>
                                        <div class="course_text">
                                            <p>{{ $item->keterangan}}</p>
                                        </div>
                                    </div>
                                    <div class="course_footer">
                                        <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                            <div class="course_info">
                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                {{-- <span>120 siswa</span> --}}
                                                <span>siswa</span>
                                            </div>
                                            <div class="course_info">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <span>{{ ambil_tahun()}}</span>
                                            </div>
                                            {{-- <div class="course_price ml-auto">4 kelas</div> --}}
                                            {{-- <div class="course_price ml-auto">kelas</div> --}}
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