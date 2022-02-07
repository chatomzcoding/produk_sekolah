    @extends('layouts.homepage')
        @section('container')
        
    <!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				@foreach ($slider as $item)
					<div class="owl-item">
						<div class="home_slider_background" style="background-image:url({{ asset('img/slider/'.$item->gambar)}})"></div>
						<div class="home_slider_content">
							<div class="container">
								<div class="row">
									<div class="col text-center">
										<div class="home_slider_title">{{ $item->nama_slider}}</div>
										<div class="home_slider_subtitle">{{ $item->deskripsi}}</div>
										<!-- <div class="home_slider_form_container">
											<form action="#" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
												<div class="d-flex flex-row align-items-center justify-content-start">
													<input type="search" class="home_search_input" placeholder="Keyword Search" required="required">
													<select class="dropdown_item_select home_search_input">
														<option>Category Courses</option>
														<option>Category</option>
														<option>Category</option>
													</select>
													<select class="dropdown_item_select home_search_input">
														<option>Select Price Type</option>
														<option>Price Type</option>
														<option>Price Type</option>
													</select>
												</div>
												<button type="submit" class="home_search_button">search</button>
											</form>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

		<!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Selamat Datang di Website Kami</h2>
						<div class="section_subtitle"><p>Sistem Informasi Akademik adalah suatu sistem yang dirancang untuk keperluan pengeloaan data-data akademik dengan penerapan teknologi komputer baik hardware maupun software </p></div>
					</div>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Features Item -->
				@foreach ($tagline as $item)
					<div class="col-lg-3 feature_col">
						<div class="feature text-center trans_400">
							<div class="feature_icon"><img src="{{ asset('/img/tagline/'.$item->icon)}}" alt=""></div>
							<h3 class="feature_title">{{ $item->nama_tagline}}</h3>
							<div class="feature_text"><p>{{ $item->keterangan}}</p></div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- Popular Courses -->

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="images/courses_background.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Program Kami</h2>
						<div class="section_subtitle"><p>Sekolah kami memiliki beberapa jurusan bidang keahlian yang saat ini dibutuhkan didunia kerja</p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				<!-- Course -->
				@foreach ($jurusan as $item)
					<div class="col-lg-4 course_col">
						<div class="course">
							<div class="course_image"><img src="{{ asset('/img/jurusan/'.$item->gambar)}}" alt=""></div>
							<div class="course_body">
								<h3 class="course_title"><a href="{{ asset('/img/jurusan/'.$item->gambar)}}" target="_blank">{{ $item->nama}}</a></h3>
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
				<div class="col-md-12 text-center">
					<a href="{{ url('/homepage/program')}}" class="btn btn-primary btn-sm">Selengkapnya Program Lainnya >></a>
				</div>
			</div>
			{{-- <div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="#">Selengkapnya</a></div>
				</div>
			</div> --}}
		</div>
	</div>

	<!-- Counter -->

	<div class="counter">
		<div class="counter_background" style="background-image:url({{ asset('/unicat/images/counter_background.jpg')}})"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="counter_content">
						<h2 class="counter_title">SELAMAT DATANG DI WEBSITE KAMI</h2>
						<div class="counter_text"><p>Temukan informasi tentang sekolah kami</p></div>

						<!-- Milestones -->

						<div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">
							
							<!-- Milestone -->
							<!-- <div class="milestone">
								<div class="milestone_counter" data-end-value="15">0</div>
								<div class="milestone_text">years</div>
							</div> -->

							<!-- Milestone -->
							<!-- <div class="milestone">
								<div class="milestone_counter" data-end-value="120" data-sign-after="k">0</div>
								<div class="milestone_text">years</div>
							</div> -->

							<!-- Milestone -->
							<!-- <div class="milestone">
								<div class="milestone_counter" data-end-value="670" data-sign-after="+">0</div>
								<div class="milestone_text">years</div>
							</div> -->

							<!-- Milestone -->
							<!-- <div class="milestone">
								<div class="milestone_counter" data-end-value="320">0</div>
								<div class="milestone_text">years</div>
							</div> -->

						</div>
					</div>

				</div>
			</div>

			{{-- <div class="counter_form">
				<div class="row fill_height">
					<div class="col fill_height">
						<form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="#">
							<div class="counter_form_title">Daftar Sekarang</div>
							<input type="text" class="counter_input" placeholder="Nama Lengkap:" required="required">
							<input type="tel" class="counter_input" placeholder="Telepon:" required="required">
							<select name="counter_select" id="counter_select" class="counter_input counter_options">
								<option>-- pilih jurusan --</option>
								<option>Rekayasa Perangkat Lunak</option>
								<option>Jaringan Komputer</option>
								<option>Adminstrasi Perkantoran</option>
							</select>
							<textarea class="counter_input counter_text_input" placeholder="Message:" required="required"></textarea>
							<button type="submit" class="counter_form_button">Kirim</button>
						</form>
					</div>
				</div>
			</div> --}}

		</div>
	</div>

	<!-- Events -->

	<div class="events">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Fasilitas Sekolah</h2>
						<div class="section_subtitle"><p>Demi menunjang pembelajaran dan menciptakan suasana sekolah yang kondusif dan efektif, kami menyediakan beberapa fasilitas seperti :</p></div>
					</div>
				</div>
			</div>
			<div class="row events_row">
				<!-- Event -->
				@foreach ($fasilitas as $item)
					<div class="col-lg-4 event_col">
						<div class="event event_left">
							<div class="event_image"><img src="{{ asset('/img/fasilitas/'.$item->gambar)}}" alt=""></div>
							<div class="event_body d-flex flex-row align-items-start justify-content-start">
								<div class="event_date">
									<div class="d-flex flex-column align-items-center justify-content-center trans_200">
										<div class="event_day trans_200">0{{ $loop->iteration}}</div>
										<div class="event_month trans_200">{{ $item->alias}}</div>
									</div>
								</div>
								<div class="event_content">
									<div class="event_title"><a href="{{ asset('/img/fasilitas/'.$item->gambar)}}" target="_blank">{{ $item->nama}}</a></div>
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
				<div class="col-md-12 text-center">
					<a href="{{ url('/homepage/fasilitas')}}" class="btn btn-primary btn-sm">Selengkapnya Fasilitas Lainnya >></a>
				</div>
			</div>
		</div>
	</div>

	<!-- Team -->

	<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('/unicat/images/team_background.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Tenaga Pengajar</h2>
						<div class="section_subtitle"><p>Kami memikili tenaga pelajar berpengalaman dan sudah tersertifikasi oleh kemendikbud</p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				
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
								<div class="team_title">{{ $item->nama.' '.$item->gelar}}</div>
								<div class="team_subtitle">{{ $item->alamat}}</div>
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
				<div class="col-md-12 text-center">
					<a href="{{ url('/homepage/guru')}}" class="btn btn-primary btn-sm">Selengkapnya Guru Lainnya >></a>
				</div>

			</div>
		</div>
	</div>

	<!-- Latest News -->

	<div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Berita Terkini</h2>
						<div class="section_subtitle"><p>Berikut adalah beberapa informasi berita terkait sekolah kami</p></div>
					</div>
				</div>
			</div>
			<div class="row news_row">
				<div class="col-lg-7 news_col">
					
					<!-- News Post Large -->
					<div class="news_post_large_container">
						<div class="news_post_large">
							<div class="news_post_image"><img src="{{ asset('img/artikel/'.$data['artikel']->gambar)}}" alt=""></div>
							<!-- <div class="news_post_large_title"><a href="blog_single.html">Here’s What You Need to Know About Online Testing for the ACT and SAT</a></div> -->
							<div class="news_post_large_title"><a href="{{ url('halaman/artikel/'.$data['artikel']->id) }}">{{ $data['artikel']->judul }}</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">{{ $data['artikel']->created_at }}</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>{{ substr($data['artikel']->isi,0,100) }}</p>
							</div>
							<div class="news_post_link"><a href="{{ url('homepage/artikel/'.$data['artikel']->id) }}">Baca Selengkapnya</a></div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 news_col">
					<div class="news_posts_small">

						@foreach ($data['listartikel'] as $item)
							<div class="news_post_small">
								<div class="news_post_small_title"><a href="{{ url('homepage/artikel/'.$item->id) }}">{{ $item->judul }}</a></div>
								<div class="news_post_meta">
									<ul>
										<li><a href="#">admin</a></li>
										<li><a href="#">{{ $item->created_at }}</a></li>
									</ul>
								</div>
							</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	{{-- <div class="newsletter">
		<div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('/unicat/images/newsletter.jpg')}}s" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">Kami Menyediakan informasi lengkap</div>
							<div class="newsletter_subtitle">Follow dan ikuti website kami</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">Berlangganan</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div> --}}
    
    @endsection
