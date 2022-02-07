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
                            <li>Guru</li>
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
                            @foreach ($guru as $item)
                            <div class="col-lg-3 col-md-6 team_col">
                                <div class="team_item">
                                    @if (is_null($item->poto))
                                        <div class="team_image"><img src="{{ asset('img/guru.png')}}" alt=""></div>
                                    @else
                                        <div class="team_image"><img src="{{ asset('img/guru/'.$item->poto)}}" alt=""></div>
                                    @endif
                                    <div class="team_body">
                                        <div class="team_title"><a href="#">{{ $item->nama_guru.' '.$item->gelar}}</a></div>
                                        <div class="team_subtitle">{{ $item->alamat_guru}}</div>
                                        {{-- <div class="social_list">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div> --}}
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