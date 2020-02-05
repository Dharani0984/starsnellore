@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Stars Nellore | Home </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Bootstrap Core CSS -->
	<link href=" {{ asset('public/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="{{ asset('public/css/style.css') }}" rel='stylesheet' type='text/css' />

	<!-- font-awesome icons CSS -->
	<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet"> 
	<!-- //font-awesome icons CSS-->

	<!-- side nav css file -->
	<link href="{{ asset('public/css/SidebarNav.min.css') }}" media='all' rel='stylesheet' type='text/css'/>
	<!-- //side nav css file -->
	
	<!-- js-->
	<script src="{{ asset('public/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('public/js/modernizr.custom.js') }}"></script>

	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//webfonts--> 
	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('public/js/bootstrap.js') }}"> </script>
	<!-- //Bootstrap Core JavaScript -->

	<!-- Metis Menu -->
	<script src="{{ asset('public/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('public/js/custom.js') }}"></script>
	<link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--//Metis Menu -->

	<!-- requried-jsfiles-for owl -->
	<link href=" {{ asset('public/css/owl.carousel.css') }} " rel="stylesheet">
	<script src="{{ asset('public/js/owl.carousel.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
				nav:true,
			});
		});
	</script>
	<!-- //requried-jsfiles-for owl -->

	<style>
		body {
			
		}
	</style>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

			<!--left-fixed -navigation-->
			
			<aside class="sidebar-left">
				<nav class="navbar navbar-inverse">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="{{ asset('home') }}"><span class="glyphicon glyphicon-star-empty"></span> Stars<span class="dashboard_text">Nellore</span></a></h1>
					</div>
					<div class="scrollbar" id="style-3">
						<div class="force-overflow">
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="sidebar-menu">
									<a href="{{ asset('view-service-modules') }}"><li class="header"><i class="fa fa-slack"></i> MODULES</li></a>
									@foreach($service_module as $module)
									<li class="treeview">
										<a href="#">
											<i class="fa fa-angle-right"></i>
											<span>{{$module->modules_name}}</span>
											<i class="fa fa-angle-left pull-right"></i></a>
											@if (!empty($module->services)) 
											<ul class="treeview-menu">
												@foreach ($module->services as $service)
												<li><a href="{{ asset('view_services_menus') }}/{{$service->id}}"><i class="fa fa-angle-right"></i>{{$service->service_name}}</a>
												</li>
												@endforeach
											</ul>
											@endif
										</li>
										@endforeach
									</ul>
									@if(!empty($labels))
									<ul class="sidebar-menu">
										<a href="{{ asset('view-labels') }}"><li class="header"><i class="fa fa-slack"></i> Labels</li></a>
										@foreach($labels as $label)
										<li class="treeview">
											<a href="{{url('/')}}/{{$label->labels_slug}}/">
												<i class="fa fa-angle-right"></i>
												<span>{{$label->labels_title}}</span>
												<i class="fa fa-angle-left pull-right"></i></a>
												@if(!empty($label->labels_menus))
												<ul class="treeview-menu">
													@foreach ($label->labels_menus as $menus)
													<li><a href="{{url('/')}}/{{$menus->labels_menu_slug}}/"><i class="fa fa-angle-right"></i>{{$menus->labels_menu_title}}</a>
													</li>
													@endforeach
												</ul>
												@endif
											</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
							</div>
							<!-- /.navbar-collapse -->
						</nav>
					</aside>
				</div>				
				<!-- header-starts -->
				<div class="sticky-header header-section ">
					<div class="header-left">
						<!--toggle button start-->
						<button id="showLeftPush"><i class="fa fa-bars"></i></button>
						<!--toggle button end-->
						<div class="profile_details_left"><!--notifications of menu start -->
							<ul class="nofitications-dropdown">
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">4</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 3 new messages</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/1.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet</p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li class="odd"><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/4.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/3.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/2.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all messages</a>
											</div> 
										</li>
									</ul>
								</li>
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 3 new notification</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/4.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet</p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li class="odd"><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/1.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/3.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li><a href="#">
											<div class="user_img"><img src="{{ asset('public/images/2.jpg') }}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all notifications</a>
											</div> 
										</li>
									</ul>
								</li>	
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">8</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 8 pending task</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Database update</span><span class="percentage">40%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar yellow" style="width:40%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar green" style="width:90%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar red" style="width: 33%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar  blue" style="width: 80%;"></div>
											</div>
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all pending tasks</a>
											</div> 
										</li>
									</ul>
								</li>	
							</ul>
							<div class="clearfix"> </div>
						</div>
						<!--notification menu end -->
						<div class="clearfix"> </div>
					</div>
					<div class="header-right">
						
						
						<!--search-box-->
						<div class="search-box">
							<form class="input">
								<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
								<label class="input__label" for="input-31">
									<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
										<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
									</svg>
								</label>
							</form>
						</div><!--//end-search-box-->
						
						<div class="profile_details">		
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">

											@if(!empty(session()->get('data')['photo']))
											<span class="prfil-img"><img src="{{url('storage/app/uploads')}}/{{ Auth::user()->photo }}" alt="" style="width: 40px;height: 46px;"> </span> 
											@endif
											<div class="user-name">
												<p>@if (session('status'))
													<div class="alert alert-success" role="alert">
														{{ session('status') }}
													</div>
													@endif

													{{ Auth::user()->name }}</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="{{ asset('myaccount') }}"><i class="fa fa-user"></i> My Account</a> </li> 
											<li> <a href="{{ asset('profile') }}"><i class="fa fa-suitcase"></i> Profile</a> </li> 
											<li>  <a class="dropdown-item" href="{{ route('logout') }}"
												onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form> </li>
										</ul>
									</li>
								</ul>
							</div>
							
						</div>
						
					</div>
					<!-- //header-ends -->
					
					