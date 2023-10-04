@extends('layouts.website')

@section('content')

<section class="testimonial-2 gray-bg px-5">
		
	<div class="container-fluid">
	<div class="row align-items-center px-5 py-3">
			
		@foreach ($services as $rowser)
		@if ($rowser->id == 1)
		@php
		$img_ico = "icon01.png";
		
		@endphp
		@endif

		@if ($rowser->id == 2)
		@php
		$img_ico = "icon02.png";
	
		@endphp
		@endif

		@if ($rowser->id == 3)
		@php
		$img_ico = "icon03.png";
	
		@endphp
		@endif

		@if ($rowser->id == 4)
		@php
		$img_ico = "icon04.png";
	
		@endphp
		@endif

		@if ($rowser->id == 5)
		@php
		$img_ico = "icon05.png";
		
		@endphp
		@endif

		@if ($rowser->id == 6)
		@php
		$img_ico = "icon06.png";
		
		@endphp
		@endif

			<!--<div class="col-lg-2 col-md-3 col-xs-12 mb-3">
				
		</div>-->
		
			<div class="col-lg-2 col-md-2 col-xs-12">
				@if ($rowser->link == '')
				<a href="{{ route('website.services.show', $rowser->id) }}" >
				  <div class="col-xs-6 h-100 px-5 pt-2">
					  <img class="d-block w-100" src="{{ asset('assets/website/images/web/'.$img_ico) }}" alt="">
					<h5 class="card-title text-light text-center">{{ $rowser->title }}</h5>		
					
				  </div>
				</a>
			  @else
				<a href="{{ $rowser->link }}" target="_blank">
				  <div class="col-xs-6 h-100 px-5">
					 <img class="d-block w-100" src="{{ asset('assets/website/images/web/'.$img_ico) }}" alt="">
					
						<h5 class="card-title text-light text-center">{{ $rowser->title }}</h5>							
						
				  </div>
				</a>
			  @endif
			</div>
		
		 
		  @endforeach

	</div>
			
		
	</div>
</section>

<!-- Slider Start -->
<div class="container-fluid bg-contant bg-showdata">
	<div class="row py-2 px-2">
		<div class="col-lg-2 col-md-3 col-sm-12 ">
			<img class="w-100" src="{{ asset('assets/website/images/web/std-natt.jpg') }}" alt="">

		</div>
		<div class="col-lg-10 col-md-9 col-sm-12 p">
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
		
								<img class="d-block w-100" src="{{ asset( '/storage/images/banners/'.$ban->image) }}"
									alt="First slide">
		
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
		</div>

	</div>
	

	@foreach ($cat as $cat_row)
	<div class="row bg-topNews1">

		<div class="col-lg-12 col-md-12 col-sm-12 pt-2 px-5">
			<h5 class="pt-3 ">{{ $cat_row->name }}</h5>
			
		</div>
	</div>
	<div class="row bg-fff px-5 bg-showdata">


		@foreach ($posts->Where('category_id', $cat_row->id)->slice(0, 6) as $post)

		@if ($cat_row->id == 1)
		@php
		$box_img = "box_news02.png";
		@endphp
		@endif

		@if ($cat_row->id == 2)
		@php
		$box_img = "box_news03-1.png";
		@endphp
		@endif



		<div class="col-lg-3 col-md-6 pt-3 card-group">
			<div class="card mb-3 card ">
				{{-- <div
					style="background:url({{ asset('/storage/images/posts/thumbnail').'/'. $box_img }}) top center no-repeat; background-size: contain; height:300px; z-index: -1; text-align: center;"
					class="d-flex align-items-center justify-content-center">
					<img src="{{ asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}"
						class="img-resposive" alt="...">
				</div> --}}

				<div class="card-body ">
					<a href="{{ route('website.posts.show', $post->id) }}">
						<div style="background:url({{ asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}) top center no-repeat; background-size: contain; height:300px; z-index: -1; text-align: center;"
							class="d-flex align-items-center justify-content-center">

						</div>
					</a>
				</div>
				<div class="card-footer">
					<i class="icofont-calendar"></i> <span class="text-sm text-muted"> {{ date('d M
						Y'),strtotime($post->created_at) }}</span>
					<h5 class="card-title">{{$post->title}}</h5>

					<a href="{{ route('website.posts.show', $post->id) }}" class="read-more">
						<p class="text-body-secondary">Learn More <i class="icofont-simple-right ml-2"></i></p>
					</a>

				</div>

			</div>
		</div>

		@endforeach


	</div>
	<div class="row bg-fff px-5 bg-showdata py-2">
		<div class="col-lg-12 col-md-12 col-sm-12 text-lg-right ">
			<a class="btn btn-main " href="{{ route('website.postsall.show',$cat_row->id)}}">View All <i
					class="icofont-simple-right ml-2  "></i></a>
		</div>
	</div>
	@endforeach

	{{-- news letter --}}

	{{-- <div class="row px-5 bg-showdata">

		<div class="col-lg-12 col-md-12 col-sm-12 pt-2 ">
			<h5 class="pt-3 ">จดหมายข่าว </h5>
			<div class="divider mb-2"></div>
		</div>
	</div>

	<div class="row bg-fff px-5 ">
		@foreach ($newsletter as $rowletter)

		<div class="col-lg-2 col-md-6 pt-3 card-group">

			<div class="card" style="width: 18rem;">
				<a href="{{ asset('/files').'/'.$rowletter->file  }}" target="_blank">
					<img src="{{ asset('/storage/images/newsletter/' . $rowletter->image) }}"
						class="card-img-top rounded mx-auto d-block w-75 pt-4" alt="...">
				</a>
				<div class="card-body">
					<p class="card-text">{{$rowletter->name}}</p>
				</div>
			</div>
		</div>

		@endforeach
	</div>
	<div class="row bg-fff px-5 ">
		<div class="col-lg-12 col-md-12 col-sm-12 text-lg-right ">
			<a class="btn btn-main " href="{{ route('website.newsletter.show')}}">View All <i
					class="icofont-simple-right ml-2  "></i></a>
		</div>
	</div> --}}


</div> {{-- div close contant --}}





@endsection