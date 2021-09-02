<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap dashboarduser dashboard, which allows you to build products like dashboarduser panels, content management systems and CRMs etc.">
		<title></title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
		<link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
		<!-- PLUGINS CSS STYLE -->
		<link href="{{ URL::asset('dashboarduser/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
		<!-- No Extra plugin used -->
		<link href="{{ URL::asset('dashboarduser/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('dashboarduser/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('dashboarduser/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
		<!-- SLEEK CSS -->
		<link id="sleek-css" rel="stylesheet" href="{{ URL::asset('dashboarduser/assets/css/sleek.css') }}" />
		<link id="bsdp-css" rel="stylesheet" href="{{ URL::asset('dashboarduser/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
		<!-- FAVICON -->
		<link href="{{asset('/bahanuser/img/TT-Logo.png')}}" rel="shortcut icon" />

		<link rel="stylesheet" href="{{ URL::asset('bahancss/event.css') }}" />

		<script src="{{ URL::asset('dashboarduser/assets/plugins/nprogress/nprogress.js') }}"></script>
	</head>
	<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
		<script>
		NProgress.configure({ showSpinner: false });
		NProgress.start();
	</script>
	<div class="mobile-sticky-body-overlay"></div>  
	<div id="toaster"></div>
	<div class="wrapper">

		
		@include('user.partials.sidebar')

		<div class="page-wrapper">
			@include('user.partials.header')
			<div class="content-wrapper">
				@yield('content')
			</div>
			@include('user.partials.footer')
		</div>
	</div>

	<script src="{{ URL::asset('dashboarduser/assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/jekyll-search.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/charts/Chart.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/toastr/toastr.min.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/js/sleek.bundle.js') }}"></script>
	<script src="{{ URL::asset('dashboarduser/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ URL::asset('SweetAlert2/sweetalert2.js') }}"></script>

	@yield('chartuser')
	</body>
</html>
<script>
	$(document).ready(function (){
		$('#eventpost').on('submit', function(e){
			console.log(e);
			// e.prefentDefault();

				let formData = new FormData(this);

				$.ajax({
					url: "{{ url('/show-event') }}",
					method: 'post',
					data: formData,

					cache: false,
					contentType: false,
					processData:false,
					success: function(response){
						// res = response.responseJSON;
						// console.log(res);
						window.location.href = "{{ route('show-event') }}";
					},
					error: function(xhr){
						let text = '';
						let res = '';
						res = xhr.responseJSON;
						console.log(res);
						if ($.isEmptyObject(res) == false){
							$.each(res.errors, function(key, val){
								Swal.fire("Invalid!", val, "error");
							});
						}
					}
				});
				return false;
			});
	});


	$(document).ready(function () {
		$('#tiketpost').on('submit', function(){
			// console.log(e);
			// e.prefentDefault();

				let formData = new FormData(this);

				$.ajax({
					url: $(this).attr('action'),
					method: 'post',
					data: formData,

					cache: false,
					contentType: false,
					processData:false,
					success: function(response){
						// res = response.responseJSON;
						// console.log(res);
						// window.location.href = "{{-- url('show-event/{id}/detail') --}}";
						location.reload();
					},
					error: function(xhr){
						let text = '';
						let res = '';
						res = xhr.responseJSON;
						console.log(res);
						if ($.isEmptyObject(res) == false){
							$.each(res.errors, function(key, val){
								Swal.fire("Invalid!", val, "error");
							});
						}
					}
				});
				return false;
			});
	});
	

	
</script>
