<!DOCTYPE html>
<html lang="en">
<head>
	{{-- <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title> --}}

	<!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>website template</title>
  
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health Care Medical Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Novena HTML Template v1.0">
    
    <!-- theme meta -->
    <meta name="theme-name" content="novena" />
  
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/website/images/web/favicon.png') }}" />
  
    <!-- 
    Essential stylesheets
    =====================================-->
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick-carousel/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/icofont/icofont.min.css') }}">
  
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
</head>
<body id="top">
	<header>
		<div class="header-top-bar">
			<div class="container">
				<div class="row align-items-center">
					
				</div>
			</div>
		</div>
		<div class="container-fluid pad-cont d-none d-sm-block bg-head">
			<div class="row pt-3">
					
				<div class="col-xl-4 col-lg-4 col-md-4 pt-3">
					<a class="navbar-brand" href="index.html">
						<img src="{{ asset('assets/website/images/web/logoTH.png') }}" alt="" class="img-fluid ">
					</a>

				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 pt-4">
					
						<img src="{{ asset('assets/website/images/web/team.png') }}" alt="" class="img-fluid d-sm-none d-md-block ml-auto">
		
				</div>
				
			</div>
		</div>
		
		{{-- <nav class="navbar navbar-expand-lg navigation" id="navbar">
			<div class="container-fluid pad-cont">
				<a class="navbar-brand " href="index.html ">
					<img src="{{ asset('assets/website/images/web/logosm-2.png') }}" alt="" class="img-fluid d-block d-sm-none">
				</a>
	
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
					aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>
	
				<div class="collapse navbar-collapse" id="navbarmain">
					<ul class="navbar-nav ml-auto mr-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">หน้าหลัก</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">ประกาศ/ข่าว</a></li>
						<li class="nav-item"><a class="nav-link" href="service.html">ใบสมัครแบบฟอร์ม</a></li>
	
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">ระบบสารสนเทศ <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown02">
								<li><a class="dropdown-item" href="department.html">Departments</a></li>
								<li><a class="dropdown-item" href="department-single.html">Department Single</a></li>
						
							</ul>
						</li>
	
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="doctor.html" id="dropdown03" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">ข้อมูลเผยแพร่ <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown03">
								<li><a class="dropdown-item" href="doctor.html">Doctors</a></li>
								<li><a class="dropdown-item" href="doctor-single.html">Doctor Single</a></li>
								<li><a class="dropdown-item" href="appoinment.html">Appoinment</a></li>
	
								<li class="dropdown dropdown-submenu dropleft">
									<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
				
									<ul class="dropdown-menu" aria-labelledby="dropdown0501">
										<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
										<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
									</ul>
								</li>
							</ul>
						</li>
	
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">ข้อมูลหน่วยงาน <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown05">
								<li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>
								<li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.html">ติดต่อเรา</a></li>
					</ul>
				</div>
			</div>
		</nav> --}}

		<nav class="navbar navbar-expand-lg navigation" id="navbar">
			<div class="container-fluid ">
				<a class="navbar-brand " href="index.html ">
					<img src="{{ asset('assets/website/images/web/logosm-2.png') }}" alt="" class="img-fluid d-block d-sm-none">
				</a>
	
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
					aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>
	
				<div class="collapse navbar-collapse" id="navbarmain">
					<ul class="navbar-nav ml-auto mr-auto">
						<li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">หน้าหลัก</a></li>
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">ประกาศ/ข่าว <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown02">
								<li><a class="dropdown-item" href="{{ route(website.postsall.show)}}">ทุนวิจัย</a></li>
								<li><a class="dropdown-item" href="department-single.html">Department Single</a></li>
						
							</ul>
						</li> --}}
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">ประกาศ/ข่าว <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown05">
								
									@foreach ($cat as $cat_row)

									<li><a class="dropdown-item" href="{{ route('website.postsall.show', $cat_row->id) }}">{{ $cat_row->name}}</a></li>

									@endforeach
								
							</ul>
						</li>
						@foreach ($navmenu as $menu)
							
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">{{ $menu->title}} <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown05">

								@foreach ($submenu->Where('postabouts_id', $menu->id) as $submenux)
									@if (!$submenux->link == '')
									<li><a class="dropdown-item" href="{{ $submenux->link }}">{{ $submenux->title}}</a></li>
								
									@else
									
									<li><a class="dropdown-item" href="{{ route('website.subabouts.show', $submenux->id) }}">{{ $submenux->title}}</a></li>
								
									@endif
								
								@endforeach
								
							</ul>
						</li>
						@endforeach

					</ul>
				</div>
			</div>
		</nav>
		<div class="divider"></div>
	</header>


	@yield('content')


	 <!-- footer Start -->
	 <footer class="footer py-4">
		<div class="container-fluid pad-cont mt-3">
			<div class="row">
				<div class="col-lg-3">
					<div class="logo mb-4">
						<img src="{{ asset('assets/website/images/web/logoEN.png') }}" alt="" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-2">
					
				</div>
				<div class="col-lg-7 text-right">
					<div>สถาบันวิจัยและพัฒนา มหาวิทยาลัยราชภัฏนครราชสีมา</div>
					<div>340 ถนนสุรนารายณ์ ตำบลในเมือง อำเภอเมืองนครราชสีมา</div>
					<div>จังหวัดนครราชสีมา 30000</div>
					<div>โทรศัพท์ </div>
	
					
				</div>
			</div>
	
			
	
			<div class="footer-btm py-2">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-12">
						<div class="copyright text-dark">
							Copyright &copy; 2021, Designed &amp; Developed by Themefisher
						</div>
					</div>
					
				</div>
	
				<div class="row">
					<div class="col-lg-4">
						<a class="backtop scroll-top-to" href="#top">
							<i class="icofont-long-arrow-up"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	 </footer>

	 <!-- 
    Essential Scripts
    =====================================-->
    <script src="{{ asset('assets/website/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/website/plugins/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/bootstrap/util.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/bootstrap/carousel.js') }}"></script>
    <script src="{{ asset('assets/website/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/website/plugins/shuffle/shuffle.min.js') }}"></script>

    <!-- Google Map -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="{{ asset('assets/website/plugins/google-map/gmap.js') }}"></script> --}}
    
    <script src="{{ asset('assets/website/js/script.js') }}"></script>

</body>
</html>
