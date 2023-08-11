@extends('layouts.website')

@section('content')

  <section class=" blog-wrap">
    <div class="container">

				
			{{-- @foreach ($cat as $cat_row) --}}
			{{-- <div class="row">
				
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h3 class="mt-4 mb-1">{{ $cat_row->name }}</h3>
						<div class="divider my-2"></div>
					</div> 
					
					@foreach ($posts->Where('category_id', $cat_row->id) as $post)
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
			
			</div> --}}

      @foreach ($cat as $cat_row)

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h3 class="mt-4 mb-1">{{ $cat_row->name }}</h3>
          <div class="divider my-2"></div>
        </div> 
      </div>

      <div class="row">
        @foreach ($posts->Where('category_id', $cat_row->id) as $post)
        <div class="col-lg-2 col-md-3 mb-2">
          <div class="doctor-img-block">
            <img src="{{ asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}" alt="" class="img-fluid img-thumbnail w-75">
  
            {{-- <div class="info-block mt-4">
              <h4 class="mb-0">Alexandar james</h4>
              <p>Orthopedic Surgary</p>
  
              <ul class="list-inline mt-4 doctor-social-links">
                <li class="list-inline-item"><a href="#!"><i class="icofont-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#!"><i class="icofont-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#!"><i class="icofont-skype"></i></a></li>
                <li class="list-inline-item"><a href="#!"><i class="icofont-linkedin"></i></a></li>
                <li class="list-inline-item"><a href="#!"><i class="icofont-pinterest"></i></a></li>
              </ul>
            </div> --}}
          </div>
        </div>
  
        <div class="col-lg-10 col-md-9 mb-2">
          <div class="doctor-details mt-4 mt-lg-0">
            <i class="icofont-calendar"></i> <span class="text-sm text-muted"> {{ date('d M Y'),
              strtotime($post->created_at) }}</span>
            <h4 class="mt-1 mb-3 title-color">{{ $post->title }}</h4>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam tempore cumque voluptate beatae quis
              inventore sapiente nemo, a eligendi nostrum expedita veritatis neque incidunt ipsa doloribus provident ex,
              at ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, perferendis officiis esse quae,
              nobis eius explicabo quidem? Officia accusamus repudiandae ea esse non reiciendis accusantium voluptates,
              facilis enim, corrupti eligendi?</p> --}}
              <a href="{{ route('website.posts.show', $post->id) }}" class="read-more">Learn More <i class="icofont-simple-right ml-2"></i></a>
  
            
          </div>
        </div>
        @endforeach
      </div>
			@endforeach

      

    </div>
  </section>

  @endsection