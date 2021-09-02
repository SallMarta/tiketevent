 <!--
	====================================
	——— LEFT SIDEBAR WITH FOOTER
	=====================================
-->
<aside class="left-sidebar bg-sidebar">
	<div id="sidebar" class="sidebar sidebar-with-footer">
		<!-- Aplication Brand -->
		<div class="app-brand">
			<a href="">
			<span class="brand-name">TukuTiket</span>
			</a>
		</div>
		<!-- begin sidebar scrollbar -->
		<div class="sidebar-scrollbar">

			<!-- sidebar menu -->
						<!-- sidebar menu -->
			<ul class="nav sidebar-inner" id="sidebar-menu">
				<li  class="has-sub" >
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#catalog"
						aria-expanded="false" aria-controls="catalog">
						<i class="mdi mdi-view-dashboard-outline"></i>
						<span class="nav-text">Dashboard</span> <b class="caret"></b>
					</a>
					<ul  class="collapse"  id="catalog"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li class="">
								<a class="sidenav-item-link" href="{{ url('/dashboard') }}">
								<span class="nav-text">Index</span>
								</a>
							</li>
							<!-- <li class="">
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Tiket</span>
								</a>
							</li> -->
						</div>
					</ul>
				</li>
				<li  class="has-sub">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#events"
						aria-expanded="false" aria-controls="events">
						<i class="mdi mdi-table"></i>
						<span class="nav-text">Event</span> <b class="caret"></b>
					</a>
					<ul class="collapse"  id="events"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="" >
								<a class="sidenav-item-link" href="{{ url('/admineventterbaru') }}">
								<span class="nav-text">Terbaru</span>
								</a>
							</li>
							<li class="">
								<a class="sidenav-item-link" href="{{ url('/admineventterkonfirmasi') }}">
								<span class="nav-text">Terkonfirmasi</span>
								</a>
							</li>
							<li class="">
								<a class="sidenav-item-link" href="{{ url('/admineventditolak') }}">
								<span class="nav-text">Ditolak</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#kategori"
						aria-expanded="false" aria-controls="kategori">
						<i class="mdi mdi-table"></i>
						<span class="nav-text">Manajemen Kategori</span> <b class="caret"></b>
					</a>
					<ul class="collapse"  id="kategori"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="" >
								<a class="sidenav-item-link" href="{{ url('/kategorievent') }}">
								<span class="nav-text">Kategori Event</span>
								</a>
							</li>
							<li class="">
								<a class="sidenav-item-link" href="{{ url('/kategoritiket') }}">
								<span class="nav-text">Kategori Tiket</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<!-- <li  class="has-sub">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#orders"
						aria-expanded="false" aria-controls="orders">
						<i class="mdi mdi-cart-outline"></i>
						<span class="nav-text">Transaksi</span> <b class="caret"></b>
					</a>
					<ul class="collapse"  id="orders"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="" >
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Pembeli</span>
								</a>
							</li>
							<li class="">
								<a class="sidenav-item-link" href="">
								<span class="nav-text"></span>
								</a>
							</li>
							<li class="">
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Pembayaran</span>
								</a>
							</li>
						</div>
					</ul>
				</li> -->
				<!-- <li  class="has-sub">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#report"
						aria-expanded="false" aria-controls="report">
						<i class="mdi mdi-signal-cellular-outline"></i>
						<span class="nav-text">Reports</span> <b class="caret"></b>
					</a>
					<ul class="collapse"  id="report"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="" >
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Grafik Top Selling Tiket</span>
								</a>
							</li>
							<li  class="" >
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Grafik Penjualan/Hari</span>
								</a>
							</li>
							<li  class="" >
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Grafik Pendapatan/Bulan</span>
								</a>
							</li>
							<li  class="" >
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Pembayaran</span>
								</a>
							</li>
						</div>
					</ul>
				</li> -->
				<!-- <li  class="has-sub">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#general"
						aria-expanded="false" aria-controls="general">
						<i class="mdi mdi-settings"></i>
						<span class="nav-text">General</span> <b class="caret"></b>
					</a>
					<ul class="collapse"  id="general"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="" >
								<a class="sidenav-item-link" href="">
								<span class="nav-text">Slides</span>
								</a>
							</li>
						</div>
					</ul>
				</li> -->
				<!-- <li  class="has-sub">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#auth"
						aria-expanded="false" aria-controls="auth">
						<i class="mdi mdi-account-multiple-outline"></i>
						<span class="nav-text">Users &amp; Roles</span> <b class="caret"></b>
					</a>
					
				</li>              -->
			</ul>
		</div>
	</div>
</aside>