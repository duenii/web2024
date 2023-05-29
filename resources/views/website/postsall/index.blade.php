@extends('layouts.website')

@section('content')

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">

           
            <h6 class="text-capitalize mb-3 text-lg"> ... </h6>
         

            <!-- <ul class="list-inline breadcumb-nav">
              <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class=" blog-wrap">
    <div class="container">
      {{-- <div class="row">
        <div class="col-lg-12 col-md-12 mb-5">
            <div class="blog-item">
              
             
              @foreach ($post as $rowpost)
    
                <div class="blog-item-content">
                  <div class="blog-item-meta mb-3 mt-4 text-center">
                    <h5 class="text-black text-capitalize mr-3"> {{ $rowpost->title }} </h5>
                    <img src="{{ asset('/images/posts').'/'. $rowpost->gallery->image }}" alt="" class="img-fluid w-50 mt-2"> 
                  </div>


                    <div class="blog-item-meta mb-3 mt-2">
                      <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> {{ date('d M Y'), strtotime($rowpost->created_at)  }} </span>
                    </div>
    
                    
                    <p class="mb-4"> {!! html_entity_decode($rowpost->content) !!}</p>
                    
    
                 
                </div>
                @endforeach
               

            </div>
        
    
      </div> --}}


      	{{-- News  --}}
				
			@foreach ($cat as $cat_row)
			<div class="row">
				
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
					@endforeach
			
			</div>
			@endforeach

    </div>
  </section>

  @endsection