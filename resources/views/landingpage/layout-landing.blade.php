<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link href="{{ url('/bahanuser/fontawesome/css/all.css') }}" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{{ url('/bahanuser/style.css') }}">
 <link rel="icon" href="{{ url('/bahanuser/img/TT-Logo.png') }}" type="image/x-icon"/>
 <script src="{{ url('/bahanuser/js.js') }}"></script>

 <title>TUKU TIKET</title>
</head>
<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ ('/') }}">Beranda</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="#banner-kategori">Kategori Event</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ url('/login') }}">Promosikan Event</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand mx-auto font-italic font-bold" href="{{ ('/') }}"><img class="logo-logo" src="{{ url('/bahanuser/img/TT-Logo.png') }}" alt="" loading="lazy"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2"><span class="fas fa-caret-down p-1"></span></button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mb-auto">
          <a class="nav-link btn btn-logres text-uppercase" href="{{ url('/register') }}"><span class="fas fa-feather"></span>Daftar</a>
        </li>
        <li class="nav-item mb-auto">
          <a class="nav-link btn btn-logres text-uppercase" href="{{ url('/login') }}" role="button"><span class="fas fa-sign-in-alt"></span>Masuk</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--end navbar-->

  <!--search bar-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark p-3 navbar-search">
    <div class="mx-auto order-0">
      <form class="form-inline">
        <input class="form-control search-input mr-sm-2" type="search" placeholder="Cari Event" aria-label="Search" id="search-button">
        <button class="btn btn-outline-light my-2 my-sm-0 order-0 ml-2 mx-auto" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </nav>
  <!--end search bar-->

  @yield('content')

  <!-- Footer -->
  <footer class="page-footer text-white">

    <div class="div-footer-1">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h2 class="mb-0 font-italic text-white"><img class="logo-logo mb-0" src="{{ url('/bahanuser/img/TT-Logo.png') }}" alt="" loading="lazy"> TUKU TIKET</h2>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">apa itu Tuku Tiket?</h6>
          <hr class="hr-hr mb-4 mt-0 d-inline-block mx-auto">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Kategori Event</h6>
          <hr class="hr-hr mb-4 mt-0 d-inline-block mx-auto">
          <p>
            <a class="text-white" href="#">Musik</a>
          </p>
          <p>
            <a class="text-white" href="#">Seni</a>
          </p>
          <p>
            <a class="text-white" href="#">Festival</a>
          </p>
          <p>
            <a class="text-white" href="#">Olahraga</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Jelajahi Tuku Tiket</h6>
          <hr class="hr-hr mb-4 mt-0 d-inline-block mx-auto">
          <p>
            <a class="text-white" href="#">Akun Saya</a>
          </p>
          <p>
            <a class="text-white" href="#">Publish Event</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Hubungi kami</h6>
          <hr class="hr-hr mb-4 mt-0 d-inline-block mx-auto">
          <p><i class="fas fa-home mr-3"></i> Omah Biner, Sleman, Yogyakarta, Indonesia</p>
          <p><i class="fas fa-envelope mr-3"></i> tukutiket@support.com</p>
          <p><i class="fas fa-phone mr-3"></i> +62 8123 4567</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
    <!-- Footer Links -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright TukuTiket</div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</body>
</html>


<!-- Optional JavaScript -->
<!--js 1-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>