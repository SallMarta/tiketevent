<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="{{asset('/bahanuser/fontawesome/css/all.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('/bahanuser/style.css')}}">
  <link rel="icon" href="{{asset('/bahanuser/img/TT-Logo.png')}}" type="image/x-icon" />
  
  <title>@yield('title')</title>
  
</head>

<body>

  <!--navbar-->
  <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ url('/home') }}">Beranda</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-uppercase" href="#">Tiket</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ url('/about') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="{{ url('/dashboardEO') }}">Promosikan Event</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand mx-auto font-italic font-bold" href="{{ url('/home') }}"><img class="logo-logo"
          src="{{asset('/bahanuser/img/TT-Logo.png')}}" alt="" loading="lazy"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2"><span
          class="fas fa-caret-down p-1"></span></button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><span class="fas fa-user"></span> {{ ucfirst(auth()->user()->name) }}</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/myprofile/' .auth()->user()->id) }}"><i class="fas fa-users-cog"></i> Akun Saya</a>
            <a class="dropdown-item" href="{{ url('/myticket') }}"><i class="fas fa-ticket-alt"></i> Tiket Saya</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!--end navbar-->

  <!--search bar-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark p-3 navbar-search">
    <div class="mx-auto order-0">
      <form class="form-inline">
        <input class="form-control search-input mr-sm-2" type="search" placeholder="Cari Event" aria-label="Search"
          id="search-button">
        <button class="btn btn-outline-light my-2 my-sm-0 order-0 ml-2 mx-auto" type="submit"><i
            class="fas fa-search"></i></button>
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
            <h2 class="mb-0 font-italic text-white"><img class="logo-logo mb-0" src="{{asset('/bahanuser/img/TT-Logo.png')}}" alt=""
                loading="lazy"> TUKU TIKET</h2>
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
            <a class="text-white" href="{{ url('/myprofile/' .auth()->user()->id) }}">Akun Saya</a>
          </p>
          <p>
            <a class="text-white" href="{{ url('/dashboardEO') }}">Publish Event</a>
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
<script src="{{ URL::asset('dashboarduser/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
  integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="{{ URL::asset('SweetAlert2/sweetalert2.js') }}"></script>
  <script src="{{asset('/bahanuser/js.js')}}"></script>
  <script>
  $(document).ready(function () {
    total();
    $('.qty').change(function () {
      total();
    });
    $('.amount').change(function () {
      total();
    });
    
    $('#checkout').on('submit', function(e) {
      e.preventDefault();

      let data_checkout = $('.tiketkategori');
      let data = [];

      $.each(data_checkout, function(key, val) {

        if(val.getElementsByClassName("qty")[0].value > 0)
        {
          data.push({
            id: $(val).attr('id'),
            qty: val.getElementsByClassName("qty")[0].value
          });
        }
      });
      // console.log(data);
      var ElementList ={};

      function addElement (ElementList, data) {
          let newList = Object.assign(ElementList, data);
          return newList;
      }

      addElement(ElementList, data);
      

      if(data.length > 0)
      {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method: 'post',
            data: ElementList,
            cache: false,
            success: function(response) {
              console.log(response);
              let url = "{{ url('/event') }}";
              window.location.href = url + '/' + response.id + '/bayar';
              // // Swal.fire('success!', 'Update success.', 'success').then(function(){
              // //   location.reload();
              // // });
            },

            error: function(xhr) {
              // alert(xhr);
              // let text = '';
              let res = '';
              res = xhr.responseJSON;
              Swal.fire("Invalid!", res.errors, "error");
              // console.log(res.errors);
              // if ($.isEmptyObject(res) == false) {
                // $.each(res.errors, function(key, val) {
                //   Swal.fire("Invalid!", val, "error");
                // });
              // }
            }
        });
      }
  });

  $('#bayar').on('submit', function(e) {
   e.preventDefault();

     $.ajax({
         url: window.location.href,
         method: 'patch',
         data: $(this).serialize(),
         cache: false,
         success: function(response) {
          //  let url = "{{-- url('/myticket') --}}";
           Swal.fire('success!', 'Payment success.', 'success').then(function(){
            window.location.href = "{{ url('/myticket') }}";
           });
          console.log(response);
         },

         error: function(xhr) {
          let res = '';
              res = xhr.responseJSON;
          try{
              if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, val) {
                  Swal.fire("Invalid!", val, "error");
                });
              }else{
               Swal.fire("Invalid!", res.errors, "error");
              }
          }catch(err){
     console.log(err);
     Swal.fire("Invalid!", res.errors, "error");
          }
         }
     });
 });
  });

  function total() {
    var sum = 0;
    $('#penjualan > tbody  > tr').each(function () {
      var price = $(this).find('.price').val();
      var qty = $(this).find('.qty').val();
      var amount = (qty * price)
      sum += amount;
      $(this).find('.amount').text('' + amount);
    });
    $('.total').text(sum);
  }
  </script>