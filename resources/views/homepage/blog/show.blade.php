@extends('layouts.homepage')
@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/blog_single.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/blog_single_responsive.css')}}">

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
								<li><a href="{{ url('/')}}">Home</a></li>
								<li><a href="{{ url('/homepage/artikel')}}">Artikel</a></li>
								<li>{{ $artikel->judul}}</li>
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

				<!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title">{{ $artikel->judul}}</div>
						<div class="blog_meta">
							<ul>
								<li>Posting Tanggal <a href="#">{{ $artikel->created_at}}</a></li>
								<li>Diposting Oleh <a href="#">admin</a></li>
							</ul>
						</div>
						<div class="blog_image"><img src="{{ asset('/img/artikel/'.$artikel->gambar)}}" alt=""></div>
						{!! $artikel->isi !!}
					</div>
					
				</div>

				<!-- Blog Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Categories -->
						{{-- <div class="sidebar_section">
							<div class="sidebar_section_title">Categories</div>
							<div class="sidebar_categories">
								<ul class="categories_list">
									<li><a href="#" class="clearfix">Art & Design<span>(25)</span></a></li>
									<li><a href="#" class="clearfix">Business<span>(10)</span></a></li>
									<li><a href="#" class="clearfix">IT & Software<span>(22)</span></a></li>
									<li><a href="#" class="clearfix">Languages<span>(12)</span></a></li>
									<li><a href="#" class="clearfix">Programming<span>(18)</span></a></li>
								</ul>
							</div>
						</div> --}}

						<!-- Latest News -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Artikel Lainnya</div>
							<div class="sidebar_latest">

								<!-- Latest Course -->
                                @foreach ($listartikel as $item)
                                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                                        <div class="latest_image"><div><img src="{{ asset('/img/artikel/'.$item->gambar)}}" alt=""></div></div>
                                        <div class="latest_content">
                                            <div class="latest_title"><a href="{{ url('/homepage/artikel/'.$item->id)}}">{{ $item->judul}}</a></div>
                                            <div class="latest_date">{{ $item->created_at}}</div>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>

						<!-- Gallery -->
						{{-- <div class="sidebar_section">
							<div class="sidebar_section_title">Instagram</div>
							<div class="sidebar_gallery">
								<ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_1_large.jpg">
											<img src="images/gallery_1.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_2_large.jpg">
											<img src="images/gallery_2.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_3_large.jpg">
											<img src="images/gallery_3.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_4_large.jpg">
											<img src="images/gallery_4.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_5_large.jpg">
											<img src="images/gallery_5.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_6_large.jpg">
											<img src="images/gallery_6.jpg" alt="">
										</a>
									</li>
								</ul>
							</div>
						</div> --}}

						<!-- Tags -->
						{{-- <div class="sidebar_section">
							<div class="sidebar_section_title">Tags</div>
							<div class="sidebar_tags">
								<ul class="tags_list">
									<li><a href="#">creative</a></li>
									<li><a href="#">unique</a></li>
									<li><a href="#">photography</a></li>
									<li><a href="#">ideas</a></li>
									<li><a href="#">wordpress</a></li>
									<li><a href="#">startup</a></li>
								</ul>
							</div>
						</div> --}}

						<!-- Banner -->
						{{-- <div class="sidebar_section">
							<div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
								<div class="sidebar_banner_background" style="background-image:url(images/banner_1.jpg)"></div>
								<div class="sidebar_banner_overlay"></div>
								<div class="sidebar_banner_content">
									<div class="banner_title">Free Book</div>
									<div class="banner_button"><a href="#">download now</a></div>
								</div>
							</div>
						</div> --}}

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	{{-- <div class="newsletter">
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
	</div> --}}

	<!-- Footer -->
@endsection