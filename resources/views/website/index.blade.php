@extends('layouts.website')

@section('content')

<!-- Slider Start -->
<div class="container-fluid bg-contant">
	<section class="banner">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				@foreach (range(1,count($banners)-1) as $i)
				<li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
				@endforeach

			</ol>
			<div class="carousel-inner">
				@foreach ($banners as $ban)
				@if($ban->id == $banners->max('id'))
				<div class="carousel-item active">
					@else
					<div class="carousel-item">
						@endif

						<img class="d-block w-100" src="{{ asset( '/images/banners/'.$ban->image) }}" alt="First slide">

					</div>
					@endforeach

				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
	</section>

	@foreach ($cat as $cat_row)
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 pt-2 bg-boxhr">
			<h5 class="py-3 px-5 text-light">{{ $cat_row->name }}</h5>
		</div>
	</div>
	<div class="row bg-fff px-5">


		@foreach ($posts->Where('category_id', $cat_row->id)->slice(0, 3) as $post)

		<div class="col-lg-3 col-md-6 ">
			<a href="{{ route('website.posts.show', $post->id) }}">
				<div class="department-block mb-5 mt-3">
					<img src="{{ asset('/images/posts').'/'. $post->gallery->image }}" alt="" class="img-fluid img-thumbnail">
					<div class="content">
						<i class="icofont-calendar"></i> <span class="text-sm text-muted"> {{ date('d M Y'),
							strtotime($post->created_at) }}</span>
						<h4 class="mt-1 mb-3 title-color">{{ Str::limit($post->title, 54, '...') }}</h4>

						<a href="{{ route('website.posts.show', $post->id) }}" class="read-more">Learn More <i
								class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</a>
		</div>
		@endforeach


	</div>
	@endforeach

	<div class="row bg-fff px-5">
		@foreach ($services as $rowser)
		@if ($rowser->id == 1)
		@php
		$class_ico = "icofont-contact-add";
		$class_boxco = "contact-block contact-block2 mb-lg-0";
		@endphp
		@endif

		@if ($rowser->id == 2)
		@php
		$class_ico = "icofont-contrast";
		$class_boxco = "contact-block contact-block1 mb-lg-0";
		@endphp
		@endif

		@if ($rowser->id == 3)
		@php
		$class_ico = "icofont-document-folder";
		$class_boxco = "contact-block contact-block3 mb-lg-0";
		@endphp
		@endif

		@if ($rowser->id == 4)
		@php
		$class_ico = "icofont-learn";
		$class_boxco = "contact-block contact-block1 mb-lg-0";
		@endphp
		@endif

		@if ($rowser->id == 5)
		@php
		$class_ico = "icofont-address-book";
		$class_boxco = "contact-block contact-block2 mb-lg-0";
		@endphp
		@endif

		@if ($rowser->id == 6)
		@php
		$class_ico = "icofont-eaten-fish";
		$class_boxco = "contact-block contact-block3 mb-lg-0";
		@endphp
		@endif

		<div class=" col-lg-3 col-md-6 col-sm-6 px-2 ">
			@if ($rowser->link == '')
			<a href="{{ route('website.services.show', $rowser->id) }}">
				<div class="service-item card mb-4 bg-box">
					<div class="icon d-flex align-items-center mr-auto ml-auto py-4">
						<i class="{{ $class_ico }} text-lg"></i>
						<h4 class="mt-3 mb-3"> {{ $rowser->title }}</h4>
					</div>

				</div>
			</a>
			@else
			<a href="{{ $rowser->link }}">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="{{ $class_ico }} text-lg"></i>
						<h4 class="mt-3 mb-3">{{ $rowser->title}}</h4>
					</div>
				</div>
			</a>

			@endif
		</div>
		@endforeach

	</div>

</div> {{-- div close contant --}}





@endsection