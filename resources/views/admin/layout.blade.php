<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap dashboardadmin dashboard, which allows you to build products like dashboardadmin panels, content management systems and CRMs etc.">
		<title>TukuTiket</title>

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
		<link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
		<!-- PLUGINS CSS STYLE -->
		<link href="{{ URL::asset('dashboardadmin/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
		<!-- No Extra plugin used -->  
		<link href="{{ URL::asset('dashboardadmin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('dashboardadmin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('dashboardadmin/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
		<!-- SLEEK CSS -->
		<link id="sleek-css" rel="stylesheet" href="{{ URL::asset('dashboardadmin/assets/css/sleek.css') }}" />
		<link id="bsdp-css" rel="stylesheet" href="{{ URL::asset('dashboardadmin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
		<!-- FAVICON -->
		<link href="{{asset('/bahanuser/img/TT-Logo.png')}}" rel="shortcut icon" />
		<!--
			HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
		-->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="{{ URL::asset('dashboardadmin/assets/plugins/nprogress/nprogress.js') }}"></script>
	</head>
	<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
	
	<script>
		NProgress.configure({ showSpinner: false });
		NProgress.start();
	</script>
	<div class="mobile-sticky-body-overlay"></div>  
	<div id="toaster"></div>
	<div class="wrapper">
		<!-- Github Link -->
		
		
		@include('admin.partials.sidebar')

		<div class="page-wrapper">
			@include('admin.partials.header')
			<div class="content-wrapper">
				@yield('content')
			</div>
			@include('admin.partials.footer')
		</div>
	</div>

	<script src="{{ URL::asset('dashboardadmin/assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/jekyll-search.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/charts/Chart.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/toastr/toastr.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/js/sleek.bundle.js') }}"></script>
	<script src="{{ URL::asset('dashboardadmin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

	@yield('chart')
	</body>
</html>
