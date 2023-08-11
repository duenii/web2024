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

						<img class="d-block w-100" src="{{ asset( '/storage/images/banners/'.$ban->image) }}" alt="First slide">

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
	<div class="row px-5">
		
		<div class="col-lg-12 col-md-12 col-sm-12 pt-2 ">
			<h5 class="pt-3 ">{{ $cat_row->name }}</h5>
			<div class="divider mb-2"></div>
		</div>
	</div>
	<div class="row bg-fff px-5">


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
				{{-- <div style="background:url({{ asset('/storage/images/posts/thumbnail').'/'. $box_img }}) top center no-repeat; background-size: contain; height:300px; z-index: -1; text-align: center;" class="d-flex align-items-center justify-content-center">
					<img src="{{ asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}" class="img-resposive" alt="..." >
				</div> --}}
				
				<div class="card-body ">
					<a href="{{ route('website.posts.show', $post->id) }}"> 
						<div style="background:url({{ asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}) top center no-repeat; background-size: contain; height:300px; z-index: -1; text-align: center;" class="d-flex align-items-center justify-content-center">
							
						</div>
					</a>
				</div>
				<div class="card-footer">
					<i class="icofont-calendar"></i> <span class="text-sm text-muted"> {{ date('d M Y'),strtotime($post->created_at) }}</span>
					<h5 class="card-title">{{$post->title}}</h5>
				
					<a href="{{ route('website.posts.show', $post->id) }}" class="read-more">
						<p class="text-body-secondary">Learn More <i class="icofont-simple-right ml-2"></i></p>
					</a>

				</div>
				
			</div>
		</div>

		@endforeach


	</div>
	<div class="row bg-fff px-5 ">
		<div class="col-lg-12 col-md-12 col-sm-12 text-lg-right ">
		<a class="btn btn-main " href="{{ route('website.postsall.show',$cat_row->id)}}">View All <i class="icofont-simple-right ml-2  "></i></a>
			</div>
	</div>
	@endforeach

{{-- news letter --}}

<div class="row px-5">
		
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
					<img src="{{ asset('/storage/images/newsletter/' . $rowletter->image) }}" class="card-img-top rounded mx-auto d-block w-75 pt-4" alt="..." >
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
		<a class="btn btn-main " href="{{ route('website.newsletter.show')}}">View All <i class="icofont-simple-right ml-2  "></i></a>
			</div>
	</div>




	

	{{-- Service --}}
		
	<section class="section testimonial-2 gray-bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="section-title text-center">
						<h2>e-service and service system</h2>
						<div class="divider mx-auto my-4"></div>
						<p>ระบบและบริการ ที่ช่วยสนับสนุนและอำนวยความสะดวกในการปฏิบัติงาน</p>
					</div>
				</div>
			</div>
		</div>
	
		<div class="container">
			<div class="row align-items-center px-5 pb-5">
				
			@foreach ($services as $rowser)
			{{-- @if ($rowser->id == 1)
			@php
			$class_ico = "icofont-contact-add";
			$class_boxco = "contact-block contact-block2 mb-lg-0";
			@endphp
			@endif
	
			@if ($rowser->id == 2)
			@php
			$class_ico = "icofont-content";
			$class_boxco = "contact-block contact-block1 mb-lg-0";
			@endphp
			@endif
	
			@if ($rowser->id == 3)
			@php
			$class_ico = "icofont-support";
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
			@endif --}}
	
		
			
				<div class="col-lg-3 col-md-3 col-xs-12 mb-3">
					@if ($rowser->link == '')
					<a href="{{ route('website.services.show', $rowser->id) }}" >
					  <div class="card h-100">
						<div class="rounded mx-auto d-block mt-5" > <i class="{{ $rowser->icofont }} text-lg "></i></div>
						<div class="card-body">
						  <h5 class="card-title">{{ $rowser->title }}</h5>
						  <p class="card-text">รายละเอียด</p>
						</div>
					  </div>
					</a>
				  @else
					<a href="{{ $rowser->link }}" target="_blank">
					  <div class="card h-100">
						<div class="rounded mx-auto d-block mt-5" > <i class="{{ $rowser->icofont }} text-lg "></i></div>
						<div class="card-body">
							<h5 class="card-title">{{ $rowser->title }}</h5>
							<p class="card-text">รายละเอียด</p>
						</div>		
					  </div>
					</a>
				  @endif
				</div>
			
			 
			  @endforeach
	
		</div>
				
			
		</div>
	</section>

</div> {{-- div close contant --}}





@endsection