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
								<li><a href="{{ url('') }}">Beranda</a></li>
								<li>{{ ucwords($sesi) }}</li>
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
							@forelse ($data as $item)
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
							@empty
								<div class="col text-center">
									<i>belum ada {{ $sesi }}</i>
								</div>
							@endforelse
                        </div>
                        </div>
                    </div>
                </div>
		</div>
	</div>

@endsection