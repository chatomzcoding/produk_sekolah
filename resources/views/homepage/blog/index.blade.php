@extends('layouts.homepage')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/blog.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/blog_responsive.css')}}">
@endsection

@section('container')
	<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Blog</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="blog_post_container">
                        <!-- Blog Post -->
                        <div class="row">
                            @foreach ($artikel as $item)
                            <div class="col-md-4">
                                    <div class="blog_post w-100">
                                        <div class="blog_post_image"><a href="{{ url('homepage/artikel/'.$item->id) }}"><img src="{{ asset('img/artikel/'.$item->gambar)}}" alt="gambar"></a></div>
                                        <div class="blog_post_body">
                                            <div class="blog_post_title"><a href="{{ url('homepage/artikel/'.$item->id)}}">{{ $item->judul}}</a></div>
                                            <div class="blog_post_meta">
                                                <ul>
                                                    <li><a href="#">Admin</a></li>
                                                    <li><a href="#">{{ $item->created_at}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="blog_post_text">
                                                <p>{!! substr($item->judul_artikel,0,200) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
				<div class="col text-center">
					<div class="load_more trans_200"><a href="#">load more</a></div>
				</div>
			</div> --}}
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_background" style="background-image:url(images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection