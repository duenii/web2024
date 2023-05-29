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
      <div class="row">
        <div class="col-lg-12 col-md-12 mb-5">
            <div class="blog-item">
              
             
              @foreach ($services as $rowser)
    
                <div class="blog-item-content">
                  <div class="blog-item-meta mb-3 mt-4 text-center">
                    <h5 class="text-black text-capitalize mr-3"> {{ $rowser->title }} </h5>
                    
                  </div>


                    <div class="blog-item-meta mb-3 mt-2">
                      <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> {{ date('d M Y'), strtotime($rowser->created_at)  }} </span>
                    </div>
    
                    <p class="mb-4">{{ $rowser->content }}</p>
                    
    
                 
                </div>
                @endforeach
               

            </div>
        
    
      </div>
    </div>
  </section>

  @endsection