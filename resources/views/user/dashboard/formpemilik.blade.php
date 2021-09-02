<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
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
		<!-- <a href="https://github.com/tafcoder/sleek-dashboard" class="github-link">
		<svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
			<defs>
			<linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
				<stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
				<stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
			</linearGradient>
			</defs>
			<path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
		</svg>
		<i class="mdi mdi-github-circle"></i>
	</a> -->


	<div class="container d-flex flex-column justify-content-between vh-100">
		<div class="row justify-content-center mt-5">
			<div class="col-xl-5 col-lg-6 col-md-10">
				<h1 class="text-center mb-4 text-dark">Formulir Pendaftaran Pemilik Event</h1>
				<div class="card">
					<div class="card-header bg-primary">
						<div class="app-brands">
							<h4 class="text-white text-center">Halo {{ ucfirst(auth()->user()->name) }}! Mau promosikan event mu?</h4>
						</div>
					</div>
					<div class="card-body p-3">
						<h5 class="text-dark mb-3 text-center">Silahkan lengkapi data diri terlebih dahulu</h5>
						<form method="post" role="form" enctype="multipart/form-data" action="{{ url('/postEO') }}">
							{{ csrf_field() }}
							<div class="row">

								<div class="form-group col-md-12 mb-4">
									<fieldset disabled>
										<input type="text" class="form-control input-lg" id="disabledTextInput" name="name" placeholder="{{ auth()->user()->email }}">
									</fieldset>
								</div>


								<div class="form-group col-md-12 mb-4">
									<input type="text" class="form-control input-lg" id="nohp" name="nohp" placeholder="No. HP">

								</div>
								<div class="form-group col-md-12 mb-4">
									<input type="text" class="form-control input-lg" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan/Jabatan">

								</div>
								<div class="form-group col-md-12 mb-4">
									<input type="text" class="form-control input-lg" id="name" name="alamat_pemilik" aria-describedby="nameHelp" placeholder="Alamat">

								</div>
								<div class="form-group col-md-12 mb-4">
									<label for="inputKartu">Foto Kartu Identitas</label>
									<input type="file" class="form-control" name="kartu_identitas" id="inputKartu" placeholder="Foto Kartu Identitas">
								</div>

								<div class="col-md-6">
									<a type="" class="btn btn-lg btn-light btn-block mb-4" href="{{ url('/home') }}">Kembali</a>
								</div>
								<div class="col-md-6">
									<button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Daftar</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="copyright pl-0">
			<p class="text-center">&copy; 2018 Copyright by
				<a class="text-primary" href="#" target="_blank">Tuku Tiket</a>.
			</p>
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
	<script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});

		$(".delete").on("submit", function () {
			return confirm("Do you want to remove this?");
		});

		$("a.delete").on("click", function () {
			event.preventDefault();
			var orderId = $(this).attr('order-id');

			if (confirm("Do you want to remove this?")) {
				document.getElementById('delete-form-' + orderId ).submit();
			}
		});

		$(".restore").on("click", function () {
			return confirm("Do you want to restore this?");
		});

		function showHideConfigurableAttributes() {
			var productType = $(".product-type").val();

			if (productType == 'configurable') {
				$(".configurable-attributes").show();
			} else {
				$(".configurable-attributes").hide();
			}
		}

		$(function(){
			showHideConfigurableAttributes();
			$(".product-type").change(function() {
				showHideConfigurableAttributes();
			});
		});
	</script>
</body>
</html>
