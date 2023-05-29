@extends('layouts.website')

@section('content')

<!-- Slider Start -->
	<div class="container-fluid pad-cont bg-contant">
	  <div class="row">
		<div class="col-xl-9 col-lg-9 col-md-9 col-xs-12 mb-5">
			<section class="banner mt-2">
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

			{{-- News  --}}
				
			@foreach ($cat as $cat_row)
			<div class="row">
				
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h3 class="mt-4 mb-1">{{ $cat_row->name }}</h3>
						<div class="divider my-2"></div>
					</div> 
					
					@foreach ($posts->Where('category_id', $cat_row->id)->slice(0, 3) as $post)
					<div class="col-lg-4 col-md-6 col-sm-12 ">
						<a href="{{ route('website.posts.show', $post->id) }}">
							<div class="service-block mb-1 ">
								<div class="d-flex justify-content-center">
										<img src="{{ asset('/images/posts').'/'. $post->gallery->image }}"  alt="images" class="img-fluid">						  
								</div>
								<div class="content title-color">
									
									<p>{{ Str::limit($post->title, 54, '...') }}</p>
									<p><i class="icofont-calendar"></i> <span class="text-sm text-muted"> {{ date('d M Y'), strtotime($post->created_at)  }}</span></p>

								
								</div>
							</div>
						</a>					
					</div>
					@endforeach
			
			</div>
			@endforeach

		</div>

		{{-- col services --}}
		<div class="col-xl-3 col-lg-3 col-md-3 col-xs-12">
			
			<div class="text-center my-4">
					<h3 class="mb-1">บริการของเรา</h3>
					
			</div>


			<div class="row">

				@foreach ($services as $rowser)

				@if ($rowser->id == 1)
					@php
						$class_ico = "icofont-contact-add";
						$class_boxco = "contact-block contact-block2  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 2)
					@php
						$class_ico = "icofont-contrast";
						$class_boxco = "contact-block contact-block1  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 3)
					@php
						$class_ico = "icofont-document-folder";
						$class_boxco = "contact-block contact-block3  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 4)
					@php
						$class_ico = "icofont-learn";
						$class_boxco = "contact-block contact-block1  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 5)
					@php
						$class_ico = "icofont-address-book";
						$class_boxco = "contact-block contact-block2  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 6)
					@php
						$class_ico = "icofont-eaten-fish";
						$class_boxco = "contact-block contact-block3  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 7)
					@php
						$class_ico = "icofont-card";
						$class_boxco = "contact-block contact-block2  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 8)
					@php
						$class_ico = "icofont-data";
						$class_boxco = "contact-block contact-block1  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 9)
					@php
						$class_ico = "icofont-exclamation-tringle";
						$class_boxco = "contact-block contact-block1  mb-lg-0";
					@endphp
				@endif

				@if ($rowser->id == 10)
					@php
						$class_ico = "icofont-users-social";
						$class_boxco = "contact-block contact-block3 mb-lg-0";
					@endphp
				@endif


				<div class="col-lg-6 col-md-6 mb-3">
					@if ($rowser->link == '')
						<a href="{{ route('website.services.show', $rowser->id) }}">
							<div class="{{ $class_boxco }}">
								<i class="{{ $class_ico }}"></i>
								<div>
									<span class="text-sm text-light">{{ $rowser->title}}</span>
								</div>							
							</div>
						</a>
					@else
					<a href="{{ $rowser->link }}">
						<div class="{{ $class_boxco }}">
							<i class="{{ $class_ico }}"></i>
							<div>
								<span class="text-sm text-light">{{ $rowser->title}}</span>
							</div>							
						</div>
					</a>
					
					@endif
					
				</div>

				@endforeach
				
			</div>

			{{-- Community --}}
			<div class="row">
				<div class="col-lg-12 col-md-12 mb-3">
					<div class="sidebar-widget  gray-bg p-4">
						<h5 class="mb-4">Community Research Journal</h5>
		
						<ul class="list-unstyled lh-35">
							<li class="d-flex justify-content-between align-items-center">
								<span>Monday - Friday</span>
								<span>9:00 - 17:00</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								<span>Saturday</span>
								<span>9:00 - 16:00</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								<span>Sunday</span>
								<span>Closed</span>
							</li>
						</ul>
		
						<div class="sidebar-contatct-info mt-4">
							<p class="mb-0">Need Urgent Help?</p>
							<h3 class="text-color-2">+23-4565-65768</h3>
						</div>
					</div>
				</div>
				

			</div>

		</div>
	  </div>    {{-- div close row --}}
	  

	  <div class="divider my-4"></div>

	  <div class="row pb-3">
		
		<div class="col-lg-12">
					{{-- dashboard --}}
					<div class="cta position-relative">
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="counter-stat">
									<i class="icofont-doctor"></i>
									<span class="h3 counter" data-count="58">58</span>k
									<p>Happy People</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="counter-stat">
									<i class="icofont-flag"></i>
									<span class="h3 counter" data-count="700">700</span>+
									<p>Surgery Comepleted</p>
								</div>
							</div>
							
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="counter-stat">
									<i class="icofont-badge"></i>
									<span class="h3 counter" data-count="40">40</span>+
									<p>Expert Doctors</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="counter-stat">
									<i class="icofont-globe"></i>
									<span class="h3 counter" data-count="20">20</span>
									<p>Worldwide Branch</p>
								</div>
							</div>
						</div>
					</div>
		</div>
	  </div>

	  <div class="divider my-4"></div>

	  <div class="row pb-3">
		
		<div class="col-lg-12">
			<div class="feature-block d-lg-flex">
				<div class="feature-item mb-5 mb-lg-0">
					<div class="feature-icon mb-4">
						<h4 class="mb-3"> <i class="icofont-database"></i> ฐานข้อมูลวิจัยแนะนำ</h4>
					</div>
					<span></span>
					
					<p class="mb-4">Get ALl time support for emergency.We have introduced the principle of family medicine.</p>
					
				</div>
			
				<div class="feature-item mb-5 mb-lg-0">
					<div class="feature-icon mb-4">
						 <h4 class="mb-3"><i class="icofont-dashboard-web"></i> เว็บไซต์ที่เกี่ยวข้อง</h4>
					</div>
					
					
					<ul class="w-hours list-unstyled">
						<li class="d-flex justify-content-between">- <span>    </span></li>
						<li class="d-flex justify-content-between">- <span>    </span></li>
						<li class="d-flex justify-content-between">- <span>   </span></li>
					</ul>
				</div>
			
				<div class="feature-item mb-5 mb-lg-0">
					<div class="feature-icon mb-4">
						<h4 class="mb-3"><i class="icofont-share-boxed"></i> เว็บไซต์หน่วยานภายใน</h4>
					</div>
					<ul class="w-hours list-unstyled">
						<li class="d-flex justify-content-between">- <span>    </span></li>
						<li class="d-flex justify-content-between">- <span>    </span></li>
						<li class="d-flex justify-content-between">- <span>   </span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div> {{-- div close contant --}}



@endsection