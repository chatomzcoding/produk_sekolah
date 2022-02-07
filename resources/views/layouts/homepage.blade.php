@php
	$info = DbSistem::showtablefirst('info_website');
    $kontak     = json_decode($info->kontak);
    $sosialmedia     = json_decode($info->sosial_media);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Akademik Sekolah</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('unicat/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('unicat/styles/responsive.css')}}">

@yield('head')


</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Ada Pertanyaan?</div></li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div>{{$kontak->no_telp}}</div>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div>{{$kontak->email}}</div>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<div class="login_button"><a href="{{ url('/login')}}">MASUK</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="{{ url('/')}}">
									<div class="logo_text">Si<span>akad</span></div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li class="{{ menu('/')}}"><a href="{{ url('/')}}">Beranda </a></li>
									{{-- <li class="{{ menu('/homepage/profil')}}"><a href="{{ url('/homepage/profil')}}">Profil Sekolah</a></li> --}}
									<li>
										<div class="dropdown">
											<a class="dropdown-toggle text-dark" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											  Profil Sekolah
											</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											  <a class="dropdown-item" href="{{ url('infoprofil/sejarah') }}">Sejarah</a>
											  <a class="dropdown-item" href="{{ url('infoprofil/visimisi') }}">Visi & Misi</a>
											  <a class="dropdown-item" href="{{ url('infoprofil/tugasfungsi') }}">Tugas & Fungsi</a>
											  <a class="dropdown-item" href="{{ url('infoprofil/profilpimpinan') }}">Profil Pimpinan</a>
											  <a class="dropdown-item" href="{{ url('infoprofil/strukturorganisasi') }}">Struktur Organisasi</a>
											  <a class="dropdown-item" href="{{ url('infoprofil/linkdapodik') }}">Link Dapodik</a>
											</div>
										  </div>
									</li>
									<li>
										<div class="dropdown">
											<a class="dropdown-toggle text-dark" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											  Informasi
											</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											  <a class="dropdown-item" href="{{ url('informasi/artikel') }}">Artikel</a>
											  <a class="dropdown-item" href="{{ url('informasi/berita') }}">Berita</a>
											  <a class="dropdown-item" href="{{ url('informasi/kegiatan') }}">Info Kegiatan</a>
											</div>
										  </div>
									</li>
									{{-- <li class="{{ menu('/homepage/artikel')}}"><a href="{{ url('/homepage/artikel')}}">Artikel</a></li> --}}
									<li class="{{ menu('/homepage/kontak')}}"><a href="{{ url('/homepage/kontak')}}">Kontak</a></li>
								</ul>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		{{-- <div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			 --}}
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		{{-- <div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div> --}}
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="{{ url('/')}}">Beranda</a></li>
				<li class="menu_mm"><a href="{{ url('/homepage/profil')}}">Profil Sekolah</a></li>
				<!-- <li class="menu_mm"><a href="#">Courses</a></li> -->
				<li class="menu_mm"><a href="{{ url('/homepage/artikel')}}">Artikel</a></li>
				<!-- <li class="menu_mm"><a href="#">Page</a></li> -->
				<li class="menu_mm"><a href="{{ url('/homepage/kontak')}}">Kontak</a></li>
			</ul>
		</nav>
	</div>
	
@yield('container')

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/footer_background.png)"></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">

							<div class="col-md-3 footer_col">
					
								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container">
										<a href="#">
											<div class="footer_logo_text">Si<span>akad</span></div>
										</a>
									</div>
									<div class="footer_about_text">
										<p>{{ $sosialmedia->line}}</p>
									</div>
									<div class="footer_social">
										<ul>
											<li><a href="{{ $sosialmedia->fb}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											{{-- <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> --}}
											<li><a href="{{ $sosialmedia->ig}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="{{ $sosialmedia->tw}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-md-3 footer_col">
					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title">Kontak Kami</div>
									<div class="footer_contact_info">
										<ul>
											<li>Email: {{ $kontak->email}}</li>
											<li>Phone:  {{ $kontak->no_telp}}</li>
											<li>{{ $info->alamat}}</li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-md-4 footer_col">
					
								<!-- Footer links -->
								<div class="footer_section footer_links">
									<div class="footer_title">Menu</div>
									<div class="footer_links_container">
										<ul>
											<li><a href="{{ url('/')}}">Beranda</a></li>
											<li><a href="{{ url('/homepage/profil')}}">Profil Sekolah</a></li>
											<li><a href="{{ url('/homepage/kontak')}}">Kontak</a></li>
											<li><a href="{{ url('/homepage/artikel')}}">Artikel</a></li>
											
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row copyright_row">
				<div class="col">
					<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
						<div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with Colorlib dikembangkan oleh <a href="https://cikarastudio.com/wp/">Cikara Studio</a></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="ml-lg-auto cr_links">
							<ul class="cr_list">
								<li><a href="#">Copyright notification</a></li>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="{{ asset('/unicat/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('/unicat/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('/unicat/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('/unicat/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset('/unicat/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset('/unicat/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('/unicat/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ asset('/unicat/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ asset('/unicat/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('/unicat/plugins/easing/easing.js')}}"></script>
<script src="{{ asset('/unicat/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{ asset('/unicat/js/custom.js')}}"></script>
</body>
</html>